<?php
session_start();
if (!isset($_SESSION['userid']) || (trim($_SESSION['userid']) == '')) { ?>
<script>
window.location = "index.php";
</script>
<?php
}
?>
