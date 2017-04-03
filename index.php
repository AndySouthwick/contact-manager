<? require_once 'functions/startsession.php'; ?>
<? require_once 'functions/functions.php'; ?>
<? //include 'functions/var.php'; ?>
<? include 'header.php'; ?>

<? if(!isset($_SESSION['user_id'])){
    include 'page/signin.php';
}else{
    include'page/cmanager.php';
}
if ($page == register){
    include"register.inc.php";
} ?>

<?include 'footer.php'; ?>