<?php
 namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Query extends ResourceController
{
	use ResponseTrait;

	public function index()
	{
		echo view('query');
	}

	public function covid() {
		$cvdata = file_get_contents("https://disease.sh/v3/covid-19/countries/Vietnam");
		return $this->respond($cvdata);
	}

	public function mcpe(string $host, int $port, int $timeout = 4) {
		$socket = @fsockopen('udp://'.$host, $port, $errno, $errstr, $timeout);
		if($errno and $socket !== false) {
			$data = ["status" => false, "message" => "Socket error"];
			return $this->respond($data);
		}elseif($socket === false) {
			$data = ["status" => false, "message" => "Socket error"];
			return $this->respond($data);
		}

		stream_Set_Timeout($socket, $timeout);
		stream_Set_Blocking($socket, true);

		// hardcoded magic https://github.com/facebookarchive/RakNet/blob/1a169895a900c9fc4841c556e16514182b75faf8/Source/RakPeer.cpp#L135
		$OFFLINE_MESSAGE_DATA_ID = \pack('c*', 0x00, 0xFF, 0xFF, 0x00, 0xFE, 0xFE, 0xFE, 0xFE, 0xFD, 0xFD, 0xFD, 0xFD, 0x12, 0x34, 0x56, 0x78);
		$command = \pack('cQ', 0x01, time()); // DefaultMessageIDTypes::ID_UNCONNECTED_PING + 64bit current time
		$command .= $OFFLINE_MESSAGE_DATA_ID;
		$command .= \pack('Q', 2); // 64bit guid
		$length = \strlen($command);
		if($length !== fwrite($socket, $command, $length)) {
			$data = ["status" => false, "message" => "Failed to write on socket."];
			return $this->respond($data);
		}

		$data = fread($socket, 4096);

		fclose($socket);

		if(empty($data) or $data === false) {
			$data = ["status" => false,"message" => "Server failed to respond"];
			return $this->respond($data);
		}
		if(substr($data, 0, 1) !== "\x1C") {
			$data = ["status" => false, "message" => "First byte is not ID_UNCONNECTED_PONG."];
			return $this->respond($data);
		}
		if(substr($data, 17, 16) !== $OFFLINE_MESSAGE_DATA_ID) {
			$data = ["status" => false, "message" => "Magic bytes do not match."];
			return $this->respond($data);
		}

		// TODO: What are the 2 bytes after the magic?
		$data = \substr($data, 35);

		// TODO: If server-name contains a ';' it is not escaped, and will break this parsing
		$data = \explode(';', $data);

		$query = [
			'status' => true,
			'message' => "Connect succesfully",
			'game-name' => $data[0] ?? null,
			'host-name' => $data[1] ?? null,
			'protocol' => $data[2] ?? null,
			'version' => $data[3] ?? null,
			'players' => ["online" => $data[4] ?? null, "max" => $data[5] ?? null],
			'spawn' => $data[7] ?? null,
			'gamemode' => $data[8] ?? null
		];
		return $this->respond($query);
	}
}