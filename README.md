or create a new repository on the command line <br>
echo "# DUCPH" >> README.md <br>
git init <br>
git add README.md <br>
git commit -m "first commit" <br>
git branch -M master <br>
git remote add origin git@github.com:jhaturaphat/DUCPH.git <br>
git push -u origin master <br> <br> <br>
                
or push an existing repository from the command line <br>
git remote add origin git@github.com:jhaturaphat/DUCPH.git <br>
git branch -M master <br>
git push -u origin master <br>
<br>

ให้สร้าง ไฟล์ hosxp.php ใน /config/hosxp.php แล้ว copy โค๊ดทั้งหมดมาจาก db.php วางใน hosxp.php ไฟล์ แก้ไข้ ตัวแปรเชื่อมต่อใหม่ให้เป็นฐานข้อมูลข้อง hosxp


DIRECTORY STRUCTURE
-------------------

      รายการเมนูอื่นๆ ที่สามารถใช้งานได้
#
/user/registration/register หน้าสมัครสมาชิก <br>
/user/registration/resend หน้าส่งอีเมล์ยืนยันใหม่อีกรอบ หากไม่ได้รับ <br>
/user/registration/confirm หน้า link เมื่อคลิก confirm อีเมล์เพื่อยันยันการสมัครสมาชิก (requires id and token query params) <br>
/user/security/login หน้าล็อคอิน <br>
/user/security/logout หน้าล็อกเอาท์ (available only via POST method)<br>
/user/recovery/request หน้าจอกู้รหัสผ่าน โดยกรอกอีเมล์ที่เคยลงทะเบียนไว้ <br>
/user/recovery/reset หน้าจอเปลี่ยนรหัสผ่านหลังจากได้รับอีเมล์กู้รหัสผ่าน (requires id and token query params)<br>
/user/settings/profile หน้าจอโปรไฟล์ user<br>
/user/settings/account หน้าจอตั้งค่า (email, username, password)<br>
/user/settings/networks หน้าจอแสดงรายการ login ผ่าน social<br>
/user/profile/show หน้าจอแสดงข้อมูลรายละเอียด user (requires id query param)<br>
/user/admin/index หน้าจอจัดการข้อมูล user<br>0


REQUIREMENTS
------------
<br>
#Admin Route
http://localhost/path/to/index.php?r=admin <br>
http://localhost/path/to/index.php?r=admin/route <br>
http://localhost/path/to/index.php?r=admin/permission <br>
http://localhost/path/to/index.php?r=admin/menu <br>
http://localhost/path/to/index.php?r=admin/role <br>
http://localhost/path/to/index.php?r=admin/assignment <br>
http://localhost/path/to/index.php?r=admin/user <br>
