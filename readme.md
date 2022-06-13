# PHP mailer sınıfı ve Faker Sınıfı
E-posta için ben gmail hesabım ile denedim. Gmail host ve port bilgilerini aşağıya ekledim. 

» Email sending
To send emails using Gmail server enter these details:
SMTP Host: smtp.gmail.com
SMTP Port: 587
SSL Protocol: OFF
TLS Protocol: ON
SMTP Username: (your Gmail username)
SMTP Password: (your Gmail password or you may need to use a Google App Password instead)

Ek olarak gmail uygulama şifresi oluşturulması gerekir onun için de gerekli aşamalar;
- first go to https://myaccount.google.com
- Select Security tab
- Scroll down and select 'Less secure app access'
- Turn on access
This will solve my “SMTP Error: Could not authenticate” in PHPMailer error. 

![](https://github.com/Sevda-96/Php-Mailer-and-Faker-Class/blob/main/Ekran%20Al%C4%B1nt%C4%B1s%C4%B1_1.JPG)

![](https://github.com/Sevda-96/Php-Mailer-and-Faker-Class/blob/main/Ekran%20Al%C4%B1nt%C4%B1s%C4%B1_2.JPG.png)

## Kaynak
- https://getcomposer.org/download/

- https://github.com/PHPMailer/PHPMailer 

- https://youtu.be/o6DG5v2NM5A

- https://fakerphp.github.io/

- https://getbootstrap.com/docs/4.0/getting-started/introduction/

