# Symfony kullanmanın avantajları nedir? Kendi cümlelerinizle açıklayınız.
Symfony bir PHP Framework'üdür. Kurulumla birlikte MVC modeline uygun biçimde kurulur. Veritabanı bağlantıları , veritabanı işlemleri için özel methodlara sahiptir. Composer ile uyumlu çalışabilir. Güvenlik konusunda yaşanabilecek sorunları düşünerek sürekli geliştirilmekte ve açıklar kapatılmaktadır. Belli bir yapısı olduğu için farklı bir yazılımcının kodları inceleyip sonuca ulaşması ya da yerinden devam etmesi daha kolaydır. Yeni başlayacağımız bir projemizde gereksinimlerimizi hazır şekilde getirir. Kurulumu kolaydır.

# Symfony ile environment (ortam) ayarlaması nasıl yapılır?
Symfony kullanabilmek için sistemimizde PHP kurulu olması gerekmekte. Composer ile kurmak istediğimizde  Composer sisteminin kurulması gerekmekte. Symfony CLI ile kurmak istediğimizde CLI  kurulumunu gerçekleştirmemiz gerekmekte. Kullandığımız Symfony sürümüne göre PHP sürümümüzde değişmekte. PHP ile birlikte Ctype , iconv , JSON , PCRE , Session , SimpleXML ve Tokenizer gibi PHP uzantılarıda kurulu olmalı. Symfony uygulaması dev, prod ve test olarak üç ortamla başlar.Her ortam, aynı kod tabanını farklı konfigürasyonla yürütmenin bir yolunu temsil eder. Bu konfigürasyonların düzenlenmesi için  config/packages/'ortam/dev,test,prod' klasörlerimize ulaşabiliriz.


# Yeni bir Symfony projesi oluşturmak için kullanılan composer komutu nedir? Alternatif bir komutla Symfony projesi oluşturabilir miyiz?
Composer Kurulum Komutu : composer create-project symfony/skeleton:"^5.4" my_project_directory

Alternatif olarak Symfony CLI  kullanarak kurulum yapabiliyoruz. CLI kurulumu için " scoop install symfony-cli "  komutunu kullanıyoruz. Daha sonrasında " symfony new --webapp my_project " komutu ile Symfony kurulumunu gerçekleştiriyoruz.

# Laravel framework ve Symfony framework arasındaki temel farklardan iki tanesini yazınız.
Veritabanı destek sistemleri olarak Symfony ORM Doctrine, Laravel ORM Eloquent'i kullananır.Symfony Twig şablon sistemini , Laravel Blade şablon sistemini kullanamakta. Symfony'nin bir dizi yeniden kullanılabilir PHP bileşeni ve kütüphanesi içeren bir PHP web uygulaması çerçevesi, Laravel ise Symfony tabanlı ücretsiz, açık kaynaklı bir PHP web çerçevesi olmasıdır. 