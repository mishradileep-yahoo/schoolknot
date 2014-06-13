<!-- My Email template Start - From Dileep -->
<table width="100%" border="0" cellspacing="0" cellpadding="20" style="background:#efefef; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; color:#232323; font-size:14px;">
	<tr>
    <td>
		<table width="600" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr>
				<td align="center">
					<table width="100%" style="min-width:300px;">
						<tr>
							<td align="right">
								<span style="font-size:12px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Having trouble viewing this email?, Try viewing it in <a href="<?php print $current_url; ?>" style="color:#119fdd;">your browser</a>.</span>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td align="center" style="text-align:left">
					<table width="100%" border="0" cellspacing="0" cellpadding="8" style="background:#fff;min-width:300px;">
						<tr>
							<td>
								<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#11a1de;height:77px">
									<tr>
										<td style="padding-left:10px"><img src="<?php print $theme_path; ?>/assets/images/email/email-temp-logo.jpg" width="176" height="74" /></td>
										<td valign="bottom" align="right"><img src="<?php print $theme_path; ?>/assets/images/email/email-temp-logo-sign.jpg" width="77" height="48"></td>
									</tr>
								</table>
								<table width="100%" border="0" cellspacing="0" cellpadding="11">
									<tr>
										<td>
											<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
												<tr>
													<td style="border-bottom:dashed 1px #bbb;padding-bottom:8px;">
													<p style="margin:0 0 7px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:17px;font-weight:bold;">Hi <?php print ucfirst($author);?>,</p>
													<p style="font-size:14px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0">
														<?php if($comment_type == 'new') { ?>
															<?php print $comment_author; ?> has replied to your <?php print $topic_type; ?>:
														<?php } else if($comment_type == 'update') { ?>
															Good news! <?php print $comment_author; ?> has answered your <?php print $topic_type; ?>:
														<?php } ?>	
													</p></td>
												</tr>
												<tr>
													<td style="padding:10px 0;border-bottom:dashed 1px #242424">
														<table width="100%" border="0" cellspacing="0" cellpadding="0" >
															<tr>
																<td width="4%" valign="top" style="padding-right:8px;">
																<?php 
																	if($topic_type == 'Question' ) {
																		$imageName = 'question-sign.jpg';
																	}
																	else if($topic_type == 'Problem'){
																		$imageName = 'publish-icon.png';
																	}
																	else if($topic_type == 'Suggestion'){
																		$imageName = 'suggestion-sign.png';
																	}
																  ?><img src="<?php print $theme_path; ?>/assets/images/email/<?php print $imageName; ?>" width="24" height="24" /></td>
																<td width="95%" valign="top"style="margin:0;font-size:16px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;"><p style="margin:0 0 7px;font-size:18px;font-weight:bold;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;"><?php print $subject; ?></p></td>
															</tr>
															
														</table>
													</td>
												</tr>
												<tr>
													<td style="padding-top:5px;padding-bottom:5px;border-bottom:dashed 1px #242424;"><table width="100%" cellpadding="0" cellspacing="0"><tr><td  style="padding-top:5px;padding-bottom:5px;font-size:14px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Forum:
														<?php 	$i=1;
																foreach($categories as $cat_name) { ?>
																	<a href="<?php print $site_url; ?>?searchString=<?php print $cat_name; ?>" style="color: #0fa1da"><?php print $cat_name; ?></a><?php if($i<count($categories)) { print ", "; } $i++; ?>
														<?php } ?><?php if($comment_type == 'new') { $comment_count = $comment_count+1; } ?> | Total replies: <strong><?php print $comment_count; ?></strong> | 
																	<a href="<?php print $current_url; ?>" style="color: #0fa1da">Last post</a> by: <strong><?php print $comment_author; ?></strong>
																	
													</td>
													</tr>
													</table>
													</td>
												</tr>
												<tr>
													<td style="padding:10px 0;border-bottom:dashed 1px #242424;background:url(<?php print $theme_path; ?>/assets/images/email/bg-content.jpg) repeat-x left top #fdfdfd;">
														<table width="100%" border="0" cellspacing="0" cellpadding="0" >
															<tr>
																<?php 
																	$replyImage = '';$imageWidth = 0;$imageHeight=0;
																  if($comment_type == 'new') {
																		$replyImage = 'email-reply.png';
																		$imageWidth = 31;
																		$imageHeight = 27;
																} else if($comment_type == 'update') { 
																		$replyImage = 'kony-email-answered.png';
																		$imageWidth = 50;
																		$imageHeight = 51;
																 } ?>
																<td width="4%" valign="top" style="padding-right:8px;"><img src="<?php print $theme_path; ?>/assets/images/email/<?php print $replyImage; ?>" width="<?php print $imageWidth; ?>" height="<?php print $imageHeight; ?>" /></td>
																<td width="95%" valign="top" style="margin:0;font-size:16px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;"><?php print preg_replace('/<pre(?:\s[^>]*)?>([^<]+)<\/pre>/i', '<table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top:15px;margin-bottom:10px;"><tr><td style="font-family: \'Trebuchet MS\', Arial, Helvetica, sans-serif; color:#A23B34; font-size:17px;width:90%;padding: 10px; text-align:left; background-color:FFFFF7; border:1px solid #EFEFEF;"><pre style="font-family: \'Trebuchet MS\', Arial, Helvetica, sans-serif;font-size:17px;">\\1</pre></td></tr></table>', $body); ?>
																</td>
															</tr>
														</table>
													</td>
												</tr>
												<tr>
													<td style="border-bottom:dashed 1px #bbb;padding-top:12px;padding-bottom:13px"><p style="margin:0;font-size:14px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">The post is located at: <br />
													<a href="<?php print $current_url; ?>" target="_blank" style="color:#0fa1da"><?php print $current_url; ?>&nbsp;<img src="<?php print $theme_path; ?>/assets/images/email/new-window-sign.jpg" width="14" height="12" /></a></p></td>
												</tr>
												<tr>
													<td align="right" style="padding-top:10px;padding-bottom:10px;"><p style="margin:0;font-size:14px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Sincerely,<br>
													<strong>Kony Accounts Team</strong></p></td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
              <table width="100%" border="0" cellspacing="0" cellpadding="24" style="background:#ddd">
                <tr>
                  <td><p style=" margin:0;font-size:14px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;"><strong> Kony, Inc.</strong><br />
                      Empowering Everywhere&trade;<br />
                      <br />
                      1-888-323-9630</p></td>
                  <td valign="top" align="right"><table border="0" cellspacing="4" cellpadding="0">
                       <tr>
                        <td><a href="https://twitter.com/Kony" target="_blank"><img src="<?php print $theme_path; ?>/assets/images/email/twitter-icon.png" width="26" height="27" alt="Twitter"></a></td>
                        <td><a href="https://www.facebook.com/pages/Kony/130841488764" target="_blank"><img src="<?php print $theme_path; ?>/assets/images/email/facebook-icon.png" alt="Facebook"></a></td>
                        <td><a href="http://www.linkedin.com/company/324781?trk=tyah" target="_blank"><img src="<?php print $theme_path; ?>/assets/images/email/linkedin-icon.png" alt="Facebook"></a></td>
                        <td><a href="http://www.youtube.com/user/KonySolutionsTV" target="_blank"><img src="<?php print $theme_path; ?>/assets/images/email/youtube-icon.png" alt="Facebook"></a></td>
                        <td><a href="http://www.slideshare.net/KonySolutionsInc" target="_blank"><img src="<?php print $theme_path; ?>/assets/images/email/slideshare-icon.png" alt="Facebook"></a></td>
                        <td><a href="https://plus.google.com/108006109343739267055/posts" target="_blank"><img src="<?php print $theme_path; ?>/assets/images/email/gplus-icon.png" alt="google plus"></a></td>
                      </tr>
                    </table></td>
                </tr>
              </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td style="padding-top:12px;">
              <p style="color: #ababab;text-align:left;margin:0;font: 10px 'Trebuchet MS', Arial, Helvetica, sans-serif;">This is system generated email. If you are not the named addressee please notify the sender immediately by e-mail at <a href="mailto:support@kony.com" style="color: #ababab;">support@kony.com</a> and then delete this email from your system. Although company has taken reasonable precautions to ensure no viruses are present in this email, the company cannot accept responsibility for any loss or damage arising from the use of this email or attachments. Kony,Inc., <a href="http://www.kony.com" target="_blank" style="color: #ababab;">www.kony.com</a><br>
                <br>
                copyright &copy; 2013 Kony Solutions ,Inc. All Rights Reserved.</p>
            </td>
                </tr>
              </table>
			
			</td>
        </tr>
      </table>
	  </td>
  </tr>
</table>
<!-- My Email template Ends - From Dileep -->