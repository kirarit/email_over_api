<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <meta name="format-detection" content="telephone=no" />

    <!-- Responsive Mobile-First Email Template by Konstantin Savchenko, 2015.
	https://github.com/konsav/email-templates/  -->

   
    <!-- MESSAGE SUBJECT -->
    <title>{{ $subject }}</title>

</head>

    <body>                
        <table>    
            <tr>
                <td>
                    <table>
                      <tr>
                            <td>
                                <h2>{{ $subject }}</h2>
                            </td>
                        </tr>        
                  

              
                        <tr>
                            <td>
                                Hello<strong> Recipient</strong>,
                                <br>
                                {{ $body }}<br>
                                <a href="/storage/files/{{ $attachment }}">attachment</a>
                    </table>              
                </td>
            </tr>
        </table>
    </body>
</html>