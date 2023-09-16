<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
<head>
<body>
<div class="example-emails margin-bottom-50">
	<!-- Start Letter -->
	<div width="100%" style="background: #eceff4; padding: 50px 20px; color: #514d6a;">
		<div style="max-width: 700px; margin: 0px auto; font-size: 14px">
			<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
				<tr>
					<td style="vertical-align: top;">
						<img src="https://www.the-social-shopping.com/imgs/logo/logo-grey.png" alt="{{ trans('frontend/global.app_name') }}" style="height: 40px" />
					</td>
				</tr>
			</table>
			<div style="padding: 40px 40px 20px 40px; background: #fff;">
				<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
					<tbody><tr>
						<td>
							@foreach ($introLines as $line)
							<p>{{ $line }}</p>
							@endforeach
							<a href="{{ $actionUrl }}" style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #01a8fe; border-radius: 5px">
								{{ $actionText }}
							</a>
							@foreach ($outroLines as $line)
							<p>{{ $line }}</p>
							@endforeach
						</td>
					</tr>
					</tbody>
				</table>
			</div>
			<div style="text-align: center; font-size: 12px; color: #a09bb9; margin-top: 20px">
				<p>
					The Social Shopping
				</p>
			</div>
		</div>
	</div>
	<!-- End Start Letter -->
</div>
</body>
</html>