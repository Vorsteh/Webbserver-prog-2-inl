<?php


class User {
    public $id;
    public $username;
    public $balance;
    public $is_admin;

    public function __construct($username, $id, $balance, $isAdmin) {
        $this->username = $username;
        $this->id = $id;
        $this->balance = $balance;
        $this->is_admin = $isAdmin;
    }
}
$db = \Core\App::resolve(\Core\Database::class);
$user = isset($_SESSION['user']['id']) ? $user = new User($_SESSION['user']['username'], $_SESSION['user']['id'], $_SESSION['user']['balance'], $_SESSION['user']['is_admin']) : null;


if(!$user){
    header('Location: /');
    exit();
}
$allTransactions = null;
if($user->is_admin){
    $allTransactions = $db->query('SELECT * FROM transactions')->all();
}
$transactions = $db->query('SELECT * FROM transactions WHERE user_id = :uid', [
    'uid' => $user->id
])->all();


$heading = 'Profile';

view('profile.view.php', [
    'heading' => $heading,
    'user' => $user,
    'transactions' => $transactions,
    'allTransactions' => $allTransactions,
]);