# "Ozan Superapp Reporting API" Task  

## Notlar

- JWT token 10 dk geçerli olması beklenmektedir. Kullanılan kütüphane sayesinde `.env` dosyasında [JWT_TTL=10](https://github.com/buraksh/ozan-superapp-reporting-api-task/blob/master/.env.example#L8) şeklinde konfigüre edilerek çözülmüştür.

- Kullanılacak veritabanı belirtilmediği için MySql kullanılmıştır. Repository pattern kullanıldığı için minimum çalışma ile veritabanı değiştirilebilir.

- Veritabanı şeması paylaşılmadığı için temel ve çok basit kurgu yapılmıştır.

- Endpointler için [test otomasyonları](tests/Feature) hazırlanmıştır.

- [Postman Collection](docs/Ozan_Superapp_Reporting_API.postman_collection.json) hazırlanmıştır.
