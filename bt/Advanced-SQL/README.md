## 1. INSTALL PROJECT:
#### 1.1 Clone project và cài đặt laravel
- open terminal
- git clone https://github.com/taitamfc/Advanced-SQL.git
- cd Advanced-SQL
- composer update

#### 1.2 Cấu hình .env sau đó chạy lệnh để tạo bảng vào CSDL
- php artisan migrate

#### 1.3 Chạy lệnh để nhập dữ liệu mẫu vào CSDL
- php artisan db:seed --class=NHANVIEN
- php artisan db:seed --class=NHACUNGCAP
- php artisan db:seed --class=MATHANG
- php artisan db:seed --class=LOAIHANG
- php artisan db:seed --class=KHACHHANG
- php artisan db:seed --class=DONDATHANG
- php artisan db:seed --class=CHITIETDATHANG

## 2. Sử dụng câu lệnh SELECT để viết các yêu cầu truy vấn dữ liệu sau đây:
#### 2.1 Cho biết danh sách các đối tác cung cấp hàng cho công ty.
#### 2.2 Mã hàng, tên hàng và số lượng của các mặt hàng hiện có trong công ty.
#### 2.3  Họ tên và địa chỉ và năm bắt đầu làm việc của các nhân viên trong công ty.
#### 2.4  Địa chỉ và điện thoại của nhà cung cấp có tên giao dịch VINAMILK là gì?
#### 2.5 Cho biết mã và tên của các mặt hàng có giá lớn hơn 100000 và số lượng hiện có ít hơn 50.
#### 2.6  Cho biết mỗi mặt hàng trong công ty do ai cung cấp.
#### 2.7  Công ty Việt Tiến đã cung cấp những mặt hàng nào?
#### 2.8 Loại hàng thực phẩm do những công ty nào cung cấp và địa chỉ của các công ty đó là gì?
#### 2.9 Những khách hàng nào (tên giao dịch) đã đặt mua mặt hàng Sữa hộp XYZ của công ty?
#### 2.10 Đơn đặt hàng số 1 do ai đặt và do nhân viên nào lập, thời gian và địa điểm giao hàng là ở đâu?
#### 2.11 Hãy cho biết số tiền lương mà công ty phải trả cho mỗi nhân viên là bao nhiêu (lương = lương cơ bản + phụ cấp).
#### 2.12 Trong đơn đặt hàng số 3 đặt mua những mặt hàng nào và số tiền mà khách hàng phải trả cho mỗi mặt hàng là bao nhiêu 
- (số tiền phải trả được tính theo công thức SOLUONG × GIABAN – SOLUONG × GIABAN × MUCGIAMGIA/100 )
#### 2.13 Hãy cho biết có những khách hàng nào lại chính là đối tác cung cấp hàng của công ty (tức là có cùng tên giao dịch).
#### 2.14 Trong công ty có những nhân viên nào có cùng ngày sinh?
#### 2.15 Những đơn đặt hàng nào yêu cầu giao hàng ngay tại công ty đặt hàng và những đơn đó là của công ty nào?
#### 2.16 Cho biết tên công ty, tên giao dịch, địa chỉ và điện thoại của các khách hàng và các nhà cung cấp hàng cho công ty.
#### 2.17 Những mặt hàng nào chưa từng được khách hàng đặt mua?
#### 2.18 Những nhân viên nào của công ty chưa từng lập bất kỳ một hoá đơn đặt hàng nào?
#### 2.19 Những nhân viên nào của công ty có lương cơ bản cao nhất?
#### 2.20 Tổng số tiền mà khách hàng phải trả cho mỗi đơn đặt hàng là bao nhiêu?
#### 2.21 Trong năm 2003, những mặt hàng nào chỉ được đặt mua đúng một lần.
#### 2.22 Hãy cho biết mỗi một khách hàng đã phải bỏ ra bao nhiêu tiền để đặt mua hàng của công ty?
#### 2.23 Mỗi một nhân viên của công ty đã lập bao nhiêu đơn đặt hàng (nếu nhân viên chưa hề lập một hoá đơn nào thì cho kết quả là 0)
#### 2.24 Cho biết tổng số tiền hàng mà cửa hàng thu được trong mỗi tháng của năm 2003 (thời được gian tính theo ngày đặt hàng).
#### 2.25 Hãy cho biết tổng số tiền lời mà công ty thu được từ mỗi mặt hàng trong năm 2003.
#### 2.26 Hãy cho biết tổng số lượng hàng của mỗi mặt hàng mà công ty đã có (tổng số lượng hàng hiện có và đã bán).
#### 2.27 Nhân viên nào của công ty bán được số lượng hàng nhiều nhất và số lượng hàng bán được của những nhân viên này là bao nhiêu?
#### 2.28 Đơn đặt hàng nào có số lượng hàng được đặt mua ít nhất?
#### 2.29 Số tiền nhiều nhất mà mỗi khách hàng đã từng bỏ ra để đặt hàng trong các đơn đặt hàng là bao nhiêu?
#### 2.30 Mỗi một đơn đặt hàng đặt mua những mặt hàng nào và tổng số tiền mà mỗi đơn đặt hàng phải trả là bao nhiêu?
#### 2.31 Hãy cho biết mỗi một loại hàng bao gồm những mặt hàng nào, tổng số lượng hàng của mỗi loại và tổng số lượng của tất cả các mặt hàng hiện có trong công ty là bao nhiêu?
#### 2.32 Thống kê xem trong năm 2003, mỗi một mặt hàng trong mỗi tháng và trong cả năm bán được với số lượng bao nhiêu
- Yêu cầu: Kết quả được hiển thị dưới dạng bảng, hai cột cột đầu là mã hàng và tên hàng, các cột còn lại tương ứng với các tháng từ 1 đến 12 và cả năm. Như vậy mỗi dòng trong kết quả cho biết số lượng hàng bán được mỗi tháng và trong cả năm của mỗi mặt hàng.

## 3. Sử dụng câu lệnh UPDATE để thực hiện các yêu cầu sau:
#### 2.33 Cập nhật lại giá trị trường NGAYCHUYENHANG của những bản ghi có NGAYCHUYENHANG chưa xác định (NULL)trong bảng DONDATHANG bằng với giá trị của trường NGAYDATHANG.
#### 2.34 Tăng số lượng hàng của những mặt hàng do công ty VINAMILK cung cấp lên gấp đôi.
#### 2.35 Cập nhật giá trị của trường NOIGIAOHANG trong bảng DONDATHANG bằng địa chỉ của khách hàng đối với những đơn đặt hàng chưa xác định được nơi giao hàng (giá trị trường NOIGIAOHANG bằng NULL).
#### 2.36 Cập nhật lại dữ liệu trong bảng KHACHHANG sao cho nếu tên công ty và tên giao dịch của khách hàng trùng với tên công ty và tên giao dịch của một nhà cung cấp nào đó thì địa chỉ, điện thoại, fax và e-mail phải giống nhau.
#### 2.37 Tăng lương lên gấp rưỡi cho những nhân viên bán được số lượng hàng nhiều hơn 100 trong năm 2003.
#### 2.38 Tăng phụ cấp lên bằng 50% lương cho những nhân viên bán được hàng nhiều nhất.
#### 2.39 Giảm 25% lương của những nhân viên trong năm 2003 không lập được bất kỳ đơn đặt hàng nào.
#### 2.40 Giả sử trong bảng DONDATHANG có thêm trường SOTIEN cho biết số tiền mà khách hàng phải trả trong mỗi đơn đặt hàng.Hãy tính giá trị cho trường này.

## 4.Thực hiện các yêu cầu dưới đây bằng câu lệnh DELETE.
#### 2.41 Xoá khỏi bảng NHANVIEN những nhân viên đã làm việc trong công ty quá 40 năm.
#### 2.42 Xoá những đơn đặt hàng trước năm 2000 ra khỏi cơ sở dữ liệu.
#### 2.43 Xoá khỏi bảng LOAIHANG những loại hàng hiện không có mặt hàng.
#### 2.44 Xoá khỏi bảng KHACHHANG những khách hàng hiện không có bất kỳ đơn đặt hàng nào cho công ty.
#### 2.45 Xoá khỏi bảng MATHANG những mặt hàng có số lượng bằng 0 và không được đặt mua trong bất kỳ đơn đặt hàng nào