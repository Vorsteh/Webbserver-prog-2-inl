<?php
// BetsController.php

use Core\App;
use Core\Database;

class BetsController {
    public function placeBet($requestData) {
        if (!isset($requestData['guess']) || !isset($requestData['betAmount'])) {
            $this->sendErrorResponse("Missing data");
            return;
        }

        $guess = $requestData['guess'];
        $betAmount = $requestData['betAmount'];

        if (!$this->validateBetAmount($betAmount)) {
            $this->sendErrorResponse("Invalid bet amount");
            return;
        }

        $randomNumber = rand(1, 10);

        $result = ($guess == $randomNumber) ? 'win' : 'lose';

        $response = [
            'result' => $result,
            'randomNumber' => $randomNumber,
        ];

        $this->sendJsonResponse($response);
    }

    private function validateBetAmount($betAmount) {
        if (!is_numeric($betAmount) || $betAmount <= 0) {
            return false;
        }
        //h'mta anv'datat och kontrollera om man har tillr'ckligt med pengar etc.
        $db = App::resolve(Database::class);

        $db->query('BLA BLA USER BALANCE ETC')->find();

        return true;
    }

    private function sendJsonResponse($d) {
        header('Content-Type: application/json');
        echo json_encode($d);
    }

    private function sendErrorResponse($m) {
        $this->sendJsonResponse(['error' => $m]);
    }
}
