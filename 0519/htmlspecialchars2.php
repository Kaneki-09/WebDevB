<?php
//htmlspecialchars2.php
//HTMLエンティティ
echo htmlspecialchars($_POST['a'], ENT_QUOTES, 'UTF-8');
