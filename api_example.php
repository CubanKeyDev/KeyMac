<?php

/* ###################################################################### */
// *
// * Author: MacKey-255
// * Description: API KeyMac Anticheat - No Tested (This have errors)
// * Recommed: No have error over here because broken AntiCheat System
// * No all Actions are implemented, this is your work to do!
// * Actions (Required): "register", "login", "is_ban", "ban", "unban", "games", "nickname"
// * Extra Actions (Not Required): "addWhitelist", "removeWhitelist"
// * Error in "addWhitelist" or "removeWhitelist" ever return OK on Server
// * Copyright 2020
// *
/* ###################################################################### */


define('security_hash', 'hash_by_keymac_ini');

if(!empty($_POST)) {
	// Security Layer
	if (!empty($_POST["security_hash"])) {
		if($_POST['security_hash'] != security_hash)
			header('Location: homeurl');
	} else {
		header('Location: homeurl');
	}
	// Check Action Exist
	if (!empty($_POST["action"])) {
		$action = $_POST['action'];
	} else {
		header('Location: homeurl');
	}
	// Pre define Data
	$data = ["status" => false, "message" => "Fatal Error"];
	
	// Select Action
	switch($action) {
		case "login":
			$mysqli = new mysqli(mysql_host, mysql_user, mysql_pass, mysql_base);
			$user = $mysqli->query("MY QUERY")->fetch_assoc();
			if($user) {
				$data["status"] = true;
				$data["message"] = "Autenticado con exito!";
			} else {
				$data["status"] = false;
				$data["message"] = "Usuario o contraseña Incorrectos!";
			}
			break;
		case "games";
			$mysqli = new mysqli(mysql_host, mysql_user, mysql_pass, mysql_base);
			$sql = $mysqli->query('SELECT product, server_name, player_count, max_player_count FROM "main"."game_server" LIMIT 0,100');
			$result = [];
			while($data = $sql->fetchArray(SQLITE3_ASSOC)) {
				$result = array_merge($result, array(["players" => $data['player_count'], "max_players" => $data['max_player_count'], "server" => $data['server_name'], "name" => $data['product']]));
				// You can add: "url" => "LINK", for when the user click server on client open Browser to LINK
			}
			// Return Data
			$data["status"] = true;
			$data["message"] = json_encode($result);
			break;
		case "register":
			$mysqli = new mysqli(mysql_host, mysql_user, mysql_pass, mysql_base);
			$user = $mysqli->query("MY QUERY")->fetch_assoc(); // Check User exists
			if(!$user) {
				// Insert Account Database
				$result = @$mysqli->exec('INSERT INTO "accounts"("username", "password", "banned") VALUES ("'. strtolower($_POST['username']) .'", "' . $_POST['password'] . '", 0)');
				// Search SteamID Database
				$user = $mysqli->query('SELECT nickname, player_id FROM "player" WHERE "nickname" = "' . strtolower($_POST['username']) . '" LIMIT 0,1')->fetchArray(SQLITE3_ASSOC);
				$wait = 45; // Max for Server Timeout
				// Wait 45 seg for Steam Registered Account (The steam register new user every 15 seg and add this in CMServer.player)
				while(!$user && $wait>0){
					sleep(1);
					$wait--;
					$user = $mysqli->query('SELECT nickname, player_id FROM "player" WHERE "nickname" = "' . strtolower($_POST['username']) . '" LIMIT 0,1')->fetchArray(SQLITE3_ASSOC);
				}
				if($wait<=0) {
					$result = @$database->exec('DELETE FROM "accounts" WHERE username = "' . strtolower($_POST['username']) . '"');
					$data["status"] = false;
					$data["message"] = "Steam no responde!";
				} else {
					// Set Steam ID to my new User in Database
					$steam_id = $user['player_id'];
					@$mysqli->query("MY QUERY");
					// Update Data Steam Registered Account (Double checking with steam account)
					@$mysqli->exec('UPDATE "player" SET "name" = "' .  strtolower($_POST['username']) . '" WHERE player_id = "' . $steam_id . '"');
					// Return Data
					$data["status"] = true;
					$data["message"] = $steam_id;
				}
			} else {
				$data["status"] = false;
				$data["message"] = "El usuario ya esta registrado!";
			}
			break;
	}
	// Return Result in JSON
	echo json_encode($data);
	
} else {
	header('Location: homeurl');
}

?>