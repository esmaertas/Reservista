<?php
error_reporting(0);
if(isset($_POST['submit']))
{
$issue=$_POST['issue'];
$description=$_POST['description'];
$email=$_SESSION['login'];
$sql="INSERT INTO  tblissues(UserEmail,Issue,Description) VALUES(:email,:issue,:description)";
$query = $dbh->prepare($sql);
$query->bindParam(':issue',$issue,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="Bilgiler başarıyla gönderildi ";
echo "<script type='text/javascript'> document.location = 'thankyou.php'; </script>";
}
else 
{
$_SESSION['msg']="Bir şeyler yanlış gitti. Lütfen tekrar deneyin.";
echo "<script type='text/javascript'> document.location = 'thankyou.php'; </script>";
}
}
?>	
<link rel="icon" href="../3.ico" type="image/ico">
<title>Reservista</title>
	<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
							<section>
							<form name="help" method="post">
								<div class="modal-body modal-spa">
									<div class="writ">
										<h4>Size nasıl yardımcı olabiliriz?</h4>
											<ul>
												
												<li class="na-me">
													<select id="country" name="issue" class="frm-field required sect" required="">
														<option value="">Sorunu seçin</option> 		
														<option value="Booking Issues">Rezervasyon Sorunları</option>
														<option value="Cancellation"> İptal</option>
														<option value="Refund">İade</option>
														<option value="Other">Diğer</option>														
													</select>
												</li>
											
												<li class="descrip">
									<input class="special" type="text" placeholder="Açıklama"  name="description" required="">
												</li>
													<div class="clearfix"></div>
											</ul>
											<div class="sub-bn">
												<form>
													<button type="submit" name="submit" class="subbtn">Gönder</button>
												</form>
											</div>
									</div>
								</div>
								</form>
							</section>
					</div>
				</div>
			</div>