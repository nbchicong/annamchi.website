<? if(!defined("hdc")) exit ();?>
<title>Liên hệ , <?=$tde?> </title> 
<meta name="keywords" content=" Liên hệ , <?=$key?>" />
<meta name="description" content="Liên hệ , <?=$mota?>" />
								<!-- BEGIN MODULE Home Featured Products -->
								<script language="JavaScript" type="text/javascript">
									scrool_auto();
								</script>
								<h1>Khách Hàng - Liên Hệ</h1>
                                <p class="bold">
                                    Với các câu hỏi về cách thức mua hàng hoặc thông tin thêm về sản phẩm của chúng tôi. 
                                </p>
                                <form action="" method="post" class="std" enctype="multipart/form-data">
                                    <fieldset>
									<?php
										$sqlstr=mysql_query("SELECT * FROM ".contact2."");
										if(mysql_num_rows($sqlstr)>0){
											while($row=mysql_fetch_array($sqlstr)){
												$em= $row['email'];
											}
										}
										if($_POST['Send']){
											if($_POST['fullname']==''){
												echo "<script language=\"JavaScript\" type=\"text/javascript\">alert('Bạn vui lòng điền đầy đủ các thông tin có dấu *');</script>";
											}
											elseif($_POST['address']==''){
												echo "<script language=\"JavaScript\" type=\"text/javascript\">alert('Bạn vui lòng điền đầy đủ các thông tin có dấu *');</script>";
											}
											elseif($_POST['telephone']==''){
												echo "<script language=\"JavaScript\" type=\"text/javascript\">alert('Bạn vui lòng điền đầy đủ các thông tin có dấu *');</script>";
											}
											elseif($_POST['email']==''){
												echo "<script language=\"JavaScript\" type=\"text/javascript\">alert('Bạn vui lòng điền đầy đủ các thông tin có dấu *');</script>";
											}
											elseif($_POST['title']==''){
												echo "<script language=\"JavaScript\" type=\"text/javascript\">alert('Bạn vui lòng điền đầy đủ các thông tin có dấu *');</script>";
											}
											elseif($_POST['content']==''){
												echo "<script language=\"JavaScript\" type=\"text/javascript\">alert('Bạn vui lòng điền đầy đủ các thông tin có dấu *');</script>";
											}
											elseif(text($_POST['code'])!=$_SESSION['stringcode']){
												echo "<script language=\"JavaScript\" type=\"text/javascript\">alert('Mã xác nhận không đúng!');</script>";
											}
											else{
												mysql_query("INSERT INTO ".contact." SET fullname='".$_POST['fullname']."'
															,address='".$_POST['address']."'
															,telephone='".$_POST['telephone']."'
															,email='".$_POST['email']."'
															,title='".$_POST['title']."'
															,content='".$_POST['content']."'
															,postdate= '".time()."'");
												echo "<script language=\"JavaScript\" type=\"text/javascript\">alert('Nội dung liên hệ đã gửi tới chúng tôi. Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.!');location.href='".$tenmien."';</script>";
												$email = $_POST['email'];
												$headers = "From: $email";
												mail($em,$_POST['title'],'Duoc gui tu website '.$tenmien.'  -  Nguoi gui: '.$_POST['fullname'].' - Dia chi: '.$_POST['address'].'  - Dien thoai:'.$_POST['telephone'].'  - Noi dung: '.$_POST['content'],$headers);
											}
										}
									?>
                                        <h3>Thông tin liên hệ</h3>
										<p>Công ty TNHH MTV AN NAM CHÍ</p><br />
                                        <p>Địa chỉ: 62/19A Trương Công Định, Phường 14, Quận Tân Bình, TP.HCM </p><br />
                                        <p>Điện thoại: 08.66840755 - 08.66842357</p><br />
                                        <p>Email: <a href="mailto:annamchi.vn@gmail.com">annamchi.vn@gmail.com</a></p>
                                        <p class="text">
                                            <label>
                                                Họ tên
                                            </label>
											<?=$require?>
                                            <input type="text" name="fullname" value="<?=$_POST['fullname']?>" />
                                        </p>
                                        <p class="text">
                                            <label>
                                                Địa chỉ
                                            </label>
											<?=$require?>
                                            <input name="address" type="text" value="<?=$_POST['address']?>" />
                                        </p>
										<p class="text">
                                            <label>
                                                Điện thoại
                                            </label>
											<?=$require?>
                                            <input name="telephone" type="text" value="<?=$_POST['telephone']?>" />
                                        </p>
										<p class="text">
                                            <label>
                                                Email
                                            </label>
											<?=$require?>
                                            <input name="email" type="text" value="<?=$_POST['email']?>" />
                                        </p>
										<p class="text">
                                            <label>
                                                Chủ đề
                                            </label>
											<?=$require?>
                                            <input name="title" value="<?=$_POST['title']?>"type="text" />
                                        </p>
                                        <p class="textarea">
                                            <label>
                                                Nội dung
                                            </label>
											<?=$require?>
                                            <textarea name="content" id="content" value="">
												<?=$_POST['content']?>
                                            </textarea>
                                        </p>
										<p class="text">
											<label>
                                                Mã xác nhận
                                            </label>
											<?=$require?>
                                            <input type="text" name="code" size="5" maxlength="10" />
											<label style="float:right; margin: 0px 265px 0px 0px; width:50px; background:#dddddd;">
												<font color="red" style="font-weight:bold;"><?=createImage()?></font>
                                            </label>
                                        </p>
                                        <p class="submit">
                                            <input type="submit" name="Send" value="Gửi" class="button_large" />
                                        </p>
										<p class="submit">
											<input type="reset" name="reset" value="Làm lại" class="button_large" />
										</p>
                                    </fieldset>
                                </form>
								<!-- END MODULE Home Featured Products -->