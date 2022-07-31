# Week6Assignment

##	ARAŞTIRMA (10 puan)
Lazy Loading ve Eager Loading arasındaki farkları yazınız.

Uygulamanın ihtiyaçlarını tam olarak bilmeden hangi loading türünün daha avantajlı olduğunu söyleyemeyiz. İki türün de kendine göre avantajları ve dezavantajları mevcut.

 -> Yukarıda detaylıca anlatıldığı üzere , lazy loading ile birbiriyle ilişkili olan entityler ihtiyaç oldukça çekilir. Bu da bize içinde bulunduğumuz case’e göre performans açısından yarar sağlayabilir.


Lazy loading ilişkili entityleri ihtiyaç oldukça çektiğinden yukarıdaki örneklerde de görüldüğü gibi eager loading’e göre veritabanına çok daha fazla kez bağlanır ve sorgu atar bunun da program için bir maliyeti vardır. Eager loading ise tek sorguda gerekli bilgileri elde eder.Örnek üzerinden gitmek gerekirse ;
     Bir sayfada verileri listeleyeceğimizi düşünelim ve listeleyeceğimiz sayfada birbiriyle ilişkili entitylerin bilgileri bir arada sunulacak olsun, yani yukarıdaki örneği baz alırsak kişiler (person) listelenirken listede kişilerin telefonu da(personPhone) aynı satırda gözükecek olsun. Bu durumda lazy loading kullanırsak binlerce kayıt için tek tek veritabanına gidip binlerce sorgu atacaktır. Halbuki bu telefon kayıtlarına daha kişi yani person kayıtlarına ihtiyaç duyduğumuz anda ihtiyaç duyuyoruz yani bu durumda ilişkili kayıtları tek seferde çekmek yani eager loading kullanmak daha avantajlı olacaktır.





##	SYMFONY İLE REST API OLUŞTURMA (90 puan)
Symfony ile temel bir Rest API oluşturunuz. Bu Rest API ile bir ürün objesiyle ilgili işlemler oluşturabilmelidir. Bir ürüne ait bu öznitelikler olmalıdır: 
- id
- urunAdi,
- urunAciklamasi, 
- urunAdedi,
- urunFiyati,
- urunKayitTarihi

Oluşturduğunuz bu Rest API içinde aşağıdaki endpointler olmalıdır:
-	/product: ürün ekleme işlemi yapılmalıdır. (POST)
-	/product: tüm ürünler listelenmelidir. (GET)
-	/product/{id}: id’ye göre ürün bilgisi gösterilmelidir. (GET)
-	/product/{id}: id’ye göre ürün güncelleme işlemi yapılmalıdır. (PUT)
-	/product/{id}: id’ye göre ürün slime işlemi yapılmalıdır. (DELETE)

Koşullar:
-	Her endpoint işlem yapıldıktan sonra success mesajı döndürmelidir.
-	Rest API için tüm dönüş değerleri Json tipinde olmalıdır.
-	Rest API Postman ile çalıştırılabilir olmalıdır.
- Ödev klasörü içerisinde ilgili Postman koleksiyonu eklenmelidir.