# Week5Assignment


## Aşağıdaki soruları bir cümleyle cevaplayınız. (2x10 = 20 puan)
- Soru 1: PHP PDO nedir? Hangi amaçla kullanılır?

PDO, PHP Data Object (PHP Veri Nesneleri) kısaltmasıdır.
PDO, desteklediği veritabanları için ortak metot ve özellikleri barındıran bir OOP sınıfıdır.
PDO sınıfını kullanarak, PDO için oluşturulmuş veritabanı sürücülerinde/sistemlerinde veri ekleme, seçme, güncelleme vb. işlemlerini yapmaya imkan verir.


- Soru 2: DB Index nedir? Avantajları ve dezavantajları nelerdir?

SQL indekslemenin amacı işlenen verinin daha az veri okunarak sorgu sonucunun daha kısa zamanda getirilmesini sağlamaktır. Indeksleme kullanarak tablonun tamamını okumaktansa oluşturacağımız indeks key i aracılığı ile okumak istediğimiz kayıda ulaşabilmemiz daha hızlı bir şekilde mümkün olacaktır. Bu sayede tamamlanması saatler süren sorgunun uygun indeksler kullanılarak saniyeler içinde getirilmesini sağlayabiliriz. Index’ler ekstra yer kaplayan değerlerdir bu sebeple filtreleme yapmayacağımız anahtar-değer’ler için index oluşturmak, disk üzerinde gereksiz yer kaplayacaktır. Ancak indexler ile update ve delate işleminde hedef data seçimi kolaylaşacaktır. İnsert ve update işleminde veriler yeniden kontrol edildikleri için performans kayıplarına da sebep olmaktadır.

## Aşağıdaki senaryoya göre symfony uygulaması oluşturunuz. (80 puan)
Symfony ile oluşturduğunuz web uygulamanızda, en az bir servisin sonucunu twig template ile ekrana çıktı olarak bastıran bir method tanımlayınız. Kullanacağınız bu servisin de başka bir servisi çağırarak kullanması gerekmektedir.