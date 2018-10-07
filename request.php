<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=Shift_JIS>
<META http-equiv="Content-Style-Type" content="text/css">
<meta name="Keywords" content="柏,朝日,新聞,ＡＳＡ,リサイクル" lang="ja">
<meta name="Description" content="柏の朝日新聞（ＡＳＡ）のリサイクル">
<meta name="Robots" content="index,follow">
<TITLE>柏のリサイクル・ゆずり葉</TITLE>
<link rel="stylesheet" type="text/css" href="./css/top.css">
</HEAD>
<body class="page">
<div id="back1">
<div class="header">
  
  <p><a href="kaisha1.html">会社概要</a>
     <a href="kobutu.html">古物営業法の表記</a>
     <a href="tokusho1.html">特商法の表記</a></p>
  <p class="cl"><img src="./pic/yuzuri1.jpg" alt="Ｌ－ｍｉｓｏ" width="120" height="50" class="pos">
                朝日新聞のリサイクル・サービス
                <img src="./pic/tel.gif" alt="tel" width="120" height="50" class="pos2">
  </p>
</div>

<ul class="navi">
  <li class="bk"><a href="index.php">ホーム</a></li>
  <li><a href="system.html">ご利用案内</a></li>
  <li><a href="yuzu1.html">ゆずりたい</a></li>
  <li><a href="https://www.asa-kashiwa.net/cgi-bin/remisecart/main.cgi?mode=cart&sid=1">掲載商品</a></li>
  <li><a href="q_a.html">Ｑ＆Ａ</a></li>
  <li><a href="policy1.html">利用規約</a></li>
</ul>

<p class="moji">■お問合せコーナー</p>


<div id="body">
  <div class="menu">
  	 <div class="box">
       <h2></h2>
         <p><a href="http://www.asahi.com/event/" target="_blank">
              <img src="../imgs/asahicom_event.gif" alt="朝日新聞" height="40" width="120" border="0"></a>
            <a href="http://www.asapre.jp" target="_blank">
              <img src="../imgs/asapre.jpg" alt="あさぷれ" width="120" height="40" class="pos"></a>
            <a href="http://www.asa-kashiwa.net">
              <img src="../imgs/asa-kashiwa.gif" alt="ＡＳＡ" width="120" height="40" class="pos"></a>
            <a href="http//www.reysol.jp" target="_blank">
              <img src="../imgs/Reysol_3.jpg" alt="レイソル" width="120" height="40" class="pos"></a>
         </p>
     </div>
     
  </div>
  <div class="main">
    <div class="content1">
	  <?php
	    // POSTデータをｷｰと値に分解
	    if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    	foreach($_POST as $k => $v) {
	    		$v = htmlspecialchars($v);
	    		
	    		// magic_quotes_gpcの値がONなら\削除
				if ( get_magic_quotes_gpc() ) {
					$v = stripslashes($v);
				}
	    		$$k = $v;
	    	}
	    } 
	    $ssl = 'https://www.asa-kashiwa.net/';
	    // 画面切り替え
	    switch (@$id) {
	      case 0:
	      	scr_ent();			// 入力画面
	      	break;
	      case 1:
	      	scr_check();		// 内容確認画面
	      	break;
	      case 2:
	      	scr_sub();			// メール送信画面
	      	break;
	      default:
	      	scr_ent();
	    }
	    
	    function scr_ent() {
	    // 入力画面
	      global $name;
	      global $address;
	      global $email;
	      global $comment;
	      global $ssl;
	     
	    ?> 
	  <h3>ご質問が御座いましたら下記、お問合せ画面よりどうぞ</h3>
	  ※ﾒｰﾙｱﾄﾞﾚｽは、半角で入力して下さい。
	  <form action="<?php echo $ssl.$_SERVER["PHP_SELF"]; ?>" method="POST">
	  
	    <table class="pos1">
	      <tr><th>お名前</th>
	          <td><input type="text" name="name" value="<?php print "$name"; ?>" size="20"></td></tr>
	      <tr><th>住所</th>
	          <td><input type="text" name="address" value="<?php print "$address"; ?>" size="50"></td></tr>
	      <tr><th>メールアドレス</th>
	          <td><input type="text" name="email" value="<?php print "$email"; ?>" size="30"></td></tr>
	      <tr><th class="pos">コメント</th>
	          <td><textarea name="comment" cols="50" rows="11"><?php print "$comment"; ?></textarea></td></tr>
	      <tr><td><input type="submit" value="確認する"></td></tr>
	    </table>
	    <input type="hidden" name="id" value="1">
	  </form>
	  
	  <?php
	  }
	  
	  // 入力内容確認
	  function scr_check() {
	   
	    global $name;
	    global $address;
	    global $email;
	    global $comment;
	    global $ssl;
	    
	    $err = 0;
        if ($name == "") {
	    	echo "<p>名前を入力して下さい。</p>";
	    	$err = 1;
	    }
	    if ($address == "") {
	    	echo "<p>住所を入力して下さい。</p>";
	    	$err = 1;
	    }
	    if ($email == "") {
	    	echo "<p>メールアドレスを入力して下さい。</p>";
	    	$err = 1;
	    } else {
	    	if (!is_mail($email)) {
	    		echo "<p>正しいメールアドレスを入力して下さい。</p>";
	    		$err = 1;
	    	}
	    }
	    
	    if ($err) {
	    	scr_err();
	    	exit();
	    }
	    
	    // 改行処理
		$comment1 = nl2br($comment);

	  ?>
	  
	    <h2>以下の内容で間違いないでしょうか？</h2>
	    <form action="<?php echo $ssl.$_SERVER["PHP_SELF"]; ?>" method="POST">
	      <table border="1" cellspacing="0" cellpadding="10px" frame="hsides" rules="rows" class="tab">
            <col width="200"><col width="320">
            <tr><th>名前</th><td><?php print "$name"; ?></td></tr>
            <tr><th>住所</th><td><?php print "$address"; ?></td></tr>
            <tr><th>メールアドレス</th><td><?php print "$email"; ?></td></tr>
            <tr><th>コメント</th><td><?php print "$comment1"; ?></td></tr>
          </table>
          <p>内容に間違いが無ければ<b>”送信ボタン”</b>をクリックして下さい。</p>
          <p><input type="submit" value="送信する">
          </p>
          <input type="hidden" name="id" value="2">
          <input type="hidden" name="name" value="<?php print "$name" ?>">
          <input type="hidden" name="address" value="<?php print "$address" ?>">
          <input type="hidden" name="email" value="<?php print "$email" ?>">
          <input type="hidden" name="comment" value="<?php print "$comment" ?>">
          
        </form>
        <form action="<?php echo $ssl.$_SERVER["PHP_SELF"]; ?>" method="POST">
          <input type="hidden" name="id" value="0">
          <input type="hidden" name="name" value="<?php print "$name" ?>">
          <input type="hidden" name="address" value="<?php print "$address" ?>">
          <input type="hidden" name="email" value="<?php print "$email" ?>">
          <input type="hidden" name="comment" value="<?php print "$comment" ?>">
          
          <p><input type="submit" value="訂正する">
             </p>
             
        </form>
      
      <?php 
      }
      
      // email address check
      function is_mail($email) {
      	
      	if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
      		return TRUE;
      	} else {
      		return FALSE;
      	}
      }
      
      // 入力項目に空欄があった場合
      function scr_err() {
        global $name;
	    global $address;
	    global $email;
	    global $comment;
	    global $ssl;
	    
	    // 改行処理
		$comment1 = nl2br($comment);
      ?>
        <h2>もう一度、入力し直して下さい。</h2>
        <form action="<?php echo $ssl.$_SERVER["PHP_SELF"]; ?>" method="POST">
          <input type="hidden" name="id" value="0">
          <input type="hidden" name="name" value="<?php print "$name" ?>">
          <input type="hidden" name="address" value="<?php print "$address" ?>">
          <input type="hidden" name="email" value="<?php print "$email" ?>">
          <input type="hidden" name="comment" value="<?php print "$comment1" ?>">
          <p><input type="submit" value="入力画面へ"></p>
        </form>
      <?php
      }
      
      
      function scr_sub() {
      	// メール組み立て・送信
      	global $name;
	    global $address;
	    global $email;
	    global $comment;
	    global $ssl;
	    
	    // 改行処理
		$comment1 = nl2br($comment);
	  ?>
	  
	    <h1>お問合せ有難う御座いました。<h1>
	    <p class="moji1">以下の内容でメールを送信しました。</p>
	    <table border="1" cellspacing="0" cellpadding="10px" frame="hsides" rules="rows" class="tab">
	      <col width="200px"><col width="320">
	      <tr><th>お名前：</th><td><?php print $name ?></td></tr>
	      <tr><th>ご住所：M</th><td><?php print $address ?></td></tr>
	      <tr><th>メールアドレス：</th><td><?php print $email ?></td></tr>
	      <tr><th>内容：</th><td><?php print $comment1 ?></td></tr>
	    </table>
	    
	  <?php
	    $header  ="Content-Type:text/plain;charset=iso-2022-jp\n";
	    $header .="From: $email";
	    
	    $to = 'yuzuriha@asa-kashiwa.net';
	    //$to = 'tsuruki@asa-kashiwa.net';
		
		// IISへの移管による文字化け防止の為に挿入
	    mb_language("Japanese");
        mb_internal_encoding ("UTF-8");
	     
	    $title = mb_convert_encoding("ゆずり葉へのお問合せ","UTF-8","auto");
	    $date  = date("Y/m/d H:i:s (D)");
	    $naiyo = "投稿時刻：$date\nお名前：$name\nご住所：$address\nメールアドレス：$email\n"
				."-----------------------------------\n内容：\n$comment\n";
	    
        
	    if ($name != "" && $address != "" && $email != "") {
	        if (mb_send_mail($to, $title, mb_convert_encoding($naiyo,mb_internal_encoding() ,"auto"), $header)) {
	    		print "  ";
	    	} else {
	    		print "**** メール送信失敗です。  ****";
	    	}
	    }
	    
	    // iFAXへの送信
	    $header  = "Content-Type:text/plain;charset=iso-2022-jp\n";
	    $header .= "From: f-market@asa-kashiwa.net";
	       
	    $to ='0471603477@olink.ne.jp';
	         
	    $naiyo = "#userid=5002688250\n#passwd=sch0112f\n"
	             ."投稿時刻：$date\nお名前：$name\nご住所：$address\nメールアドレス：$email\n"
                 ."-----------------------------------\n内容：\n$comment\n";
        
	        
	    if ($name != "" && $address != "" && $email != "") {
	       if (mb_send_mail($to, $title, mb_convert_encoding($naiyo,mb_internal_encoding() ,"auto"), $header)) {
	          print "  ";
	       } else {
	          print "**** メール送信失敗です。  ****";
	       }
	    }
	   }
	   
	   ?>

	
	</div>
	  <p class="no2">伸光堂千葉販売株式会社　リサイクル部　Ｌ－ＭＩＳＯ</p>
	  <p class="no1">Tel : (04)7164-3732</p>
    
  </div>
</div>
</div>
<div class="footer">
  
  <address>&#169; 2010 - 2010, 伸光堂千葉販売(株)　 All Rights Reserved.</address>
</div>

</BODY>
</HTML>
