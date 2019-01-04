# 3in1 Course
> การเขียนโปรแกรมสร้างเว็บแอพพลิเคชั่น Codeigniter Framework 3HMVC+Bootstra4+AngularJS

## Demo
<p>
  <a href="http://www.youtube.com/watch?feature=player_embedded&v=sb73-RBMo0E" target="_blank" title="คลิกเพื่อดูวิดิโอ">
  <img src="http://img.youtube.com/vi/sb73-RBMo0E/0.jpg" alt="sb73-RBMo0E" width="40%" />
</a>
<a href="http://www.youtube.com/watch?feature=player_embedded&v=sb73-RBMo0E" target="_blank" title="คลิกเพื่อดูวิดิโอ">
  <img src="http://img.youtube.com/vi/sb73-RBMo0E/0.jpg" alt="sb73-RBMo0E" width="40%" />
</a>
</p>

## Workshop / base Codeigniter3 HMVC
- แบ่งออกเป็น 2 ส่วน
    - ระบบหลังบ้าน `app_backend`
        - เตรียม template ในที่นี้จะใช้ [vali-admin template](https://github.com/pratikborsadiya/vali-admin)
        - จัดการสินค้า เพิ่ม/ลบ/แก้ไขข้อมูลสินค้า
    - ระบบแสดงผลหน้าบ้าน `app_frontent`
        - สร้าง template โดยใช้ [Bootstrap4](https://getbootstrap.com/), [AngularJS](https://angularjs.org/)
        - สร้างหน้า `index.php` ไว้แสดงสินค้าในที่นี่จะแสดงสินค้าในหน้า Landing Page
        - สร้างหน้าตะกร้าสินค้า `cart.php` ไว้แสดงรายการสั่งซื้อ
        - สร้างหน้าแจ้งชำระเงิน `payment.php` ฟอร์มสำหรับแจ้งชำระเงิน
## อ่านก่อน Clone / Download
#### สำหรับคนี่ไม่ได้ทำ `Visult Host` หมายถึงตอนเรียกใช้งานหน้าเว็บขึ้นต้นด้วย `http://localhost/shop-cms/` ต้องทำการปรับเปลี่ยนโค้ดบางส่วน 
> สำหรับคนที่ทำ Visult Host ไม่ต้องปรับอะไรใดๆทั้งสิ้น
- เปิดไฟล์ `index.php` อยู่ในโฟลเดอร์  `shop-cms/index.php` จากนั้นแก้ไขดังนี้ บรรทัดที่ 21-23 ให้แทนที่ด้วยโค้ดข้างล่างนี้
```
// $host_name = explode( '.', $_SERVER['HTTP_HOST'] );
// $site_name = $host_name[count( $host_name ) - 2];
$site_name = $_SERVER['HTTP_HOST'];
```
ต่อบรรทัดที่ 97-115 ให้แทนที่ด้วยโค้ดข้างล่างนี้
```
if ( isset( $uri ) && $uri[3] === APP_API ) {

    $_SERVER['REQUEST_URI'] = str_replace( APP_API . '/', '', $_SERVER['REQUEST_URI'] );
    $_SERVER['REQUEST_URI'] = str_replace( APP_API, '', $_SERVER['REQUEST_URI'] );
    $application_folder = APP_API_PATH;

} elseif ( isset( $uri ) && $uri[3] === APP_BACKEND ) {

    $_SERVER['REQUEST_URI'] = str_replace( APP_BACKEND . '/', '', $_SERVER['REQUEST_URI'] );
    $_SERVER['REQUEST_URI'] = str_replace( APP_BACKEND, '', $_SERVER['REQUEST_URI'] );
    $application_folder = APP_BACKEND_PATH;

} else {

    $_SERVER['REQUEST_URI'] = str_replace( APP_FRONTEND . '/', '', $_SERVER['REQUEST_URI'] );
    $_SERVER['REQUEST_URI'] = str_replace( APP_FRONTEND, '', $_SERVER['REQUEST_URI'] );
    $application_folder = APP_FRONTEND_PATH;

}
```

## สไลด์นําเสนอ
- [สไลด์นําเสนอ 1](https://docs.google.com/presentation/d/1mUWPu1C316YDOj9jMEFgVRfNrD8MGnWJeBPd5vXvU1E/edit?usp=sharing)
- [สไลด์นําเสนอ 2](https://drive.google.com/file/d/1yVG6LxccBPNz_HbSQm_iLRHYvplpIogl/view)
- [สไลด์นําเสนอ 3](https://drive.google.com/file/d/1FxHqm7mQbNdvAJQWxqN-B6WLxcQhG67d/view?usp=sharing)

## วัตถุประสงค์
- เข้าใจภาพรวมโครงสร้างและการติดตั้ง CodeIgniter Framework 
- เข้าใจภาพรวมโครงสร้างการทำงานของ Bootstrap Framwork และการติดตั้งเพื่อใช้งาน
- เข้าใจภาพรวมโครงสร้างการทำงานของ Angular JS และการประยุกต์ใช้กับชิ้นงาน
- เขียนโปรแกรมเชื่อมต่อฐานข้อมูล เพิ่ม/แก้ไข/ลบ ข้อมูลได้
- เขียนระบบอัพโหลดไฟล์ได้
- เขียนระบบส่งเมล์ด้วย CodeIgniter ได้

## กลุ่มเป้าหมาย
คอร์สนี้เหมาะสำหรับเป็นแนวทางให้ผู้เริ่มต้นพัฒนาเว็บแอพด้วย CodeIgniter Framework, Bootstrap 4และ Angular JS ทุกคนไม่ว่าจะเป็น
- นักเรียนนักศึกษา
- ครู อาจารย์ วิทยากรที่สนใจ
- นักวิชาการ นักไอที หรือผู้ดูและระบบ
- ตลอดจนผู้สนใจทั่วไป
