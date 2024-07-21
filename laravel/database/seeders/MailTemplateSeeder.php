<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mail_templates')->insert([
            [
                "name" => config('mail.template_name.verify_register'),
                "title" => 'Xác nhận Đăng ký Tài khoản của Bạn',
                "body" => '
                    <header><h4>Chào bạn: {{USER_NAME}}</h4></header>
                    <section>
                        <p>Chúng tôi đã nhận được yêu cầu đăng ký tài khoản của bạn. Dưới đây là mã code xác thực của bạn:</p>
                        <p>Mã Xác Thực: {{CODE}} (mã xác thực tồn tại đến {{EXPIRED_TIME}})</p>
                        <p>Vui lòng sử dụng mã code này để hoàn tất quá trình đăng ký tài khoản của bạn trên {{ROUTE_PROJECT_WEB_HOME_INDEX}}</p>
                        <p>Nếu bạn không thực hiện yêu cầu này, bạn có thể bỏ qua email này.</p>
                    </section>
                    <footer}>
                        <p>Chúng tôi xin cảm ơn sự quan tâm của bạn đến Dịch vụ của chúng tôi. Nếu bạn cần thêm sự hỗ trợ hoặc có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi qua {{ROUTE_CONTACT}}.</p>
                        <p>Chân thành {{COMPANY_NAME}}<p>
                    </footer>',
                "status" => 1,
            ],
            // [
            //     "name" => config('mail.template_name.successful_hire'),
            //     "title" => 'Xác nhận đăng ký thuê dịch vụ thành công',
            //     "body" => '
            //         <header><h4>Chào bạn: {{USER_NAME}}</h4></header>
            //         <section>
            //             <p>Chúng tôi xin gửi lời cảm ơn đặc biệt đến bạn về việc chọn dịch vụ {{SERVICE_NAME}} của chúng tôi (Loại: {{SERVICE_TYPE_NAME}}). Hóa đơn của bạn đã được xử lý thành công. Dưới đây là các thông tin quan trọng:</p>
            //             <p>Tên tài khoản: {{EMAIL}} (tài khoản email bạn đăng ký)</p>
            //             <p>Mật khẩu tạm thời: {{PASSWORD}}</p>
            //             <p>Địa chỉ trang web quản lý: {{ROUTE_ENTITY_ADMIN}}</p>
            //             <p>Vui lòng đăng nhập vào trang web quản lý bằng tên tài khoản và mật khẩu tạm thời. Sau khi đăng nhập, bạn có thể thay đổi mật khẩu tạm thời thành mật khẩu của riêng mình và bắt đầu sử dụng dịch vụ của chúng tôi.</p>
            //         </section>
            //         <footer}>
            //             <p>Nếu bạn cần hỗ trợ hoặc có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi qua {{ROUTE_CONTACT}}. Chúng tôi luôn sẵn sàng để hỗ trợ bạn.</p>
            //             <p>Chúng tôi rất mong muốn được hợp tác và cảm ơn bạn đã chọn dịch vụ {{SERVICE_NAME}}</p>
            //             <p>Chân thành {{COMPANY_NAME}}<p>
            //         </footer>',
            //     "status" => 1,
            // ],
            // [
            //     "name" => config('mail.template_name.grant_password'),
            //     "title" => 'Cấp mật khẩu thành công',
            //     "body" => '
            //         <header><h4>Chào bạn: {{USER_NAME}}</h4></header>
            //         <section>
            //             <p>Chúng tôi xin thông báo rằng một mật khẩu mới đã được tạo và cấp cho tài khoản của bạn. Hãy sử dụng thông tin dưới đây để đăng nhập vào hệ thống:</p>
            //             <p>Tên tài khoản: {{EMAIL}}</p>
            //             <p>Mật khẩu tạm thời: {{PASSWORD}}</p>
            //             <p>Địa chỉ trang web quản lý: {{ROUTE_ENTITY_ADMIN}}</p>
            //             <p>Lưu ý rằng đây chỉ là mật khẩu tạm thời và bạn sẽ được yêu cầu thay đổi mật khẩu ngay sau khi đăng nhập lần đầu tiên. Để bảo vệ tính bảo mật của tài khoản, vui lòng không chia sẻ thông tin đăng nhập này với người khác.</p>
            //         </section>
            //         <footer}>
            //             <p>Nếu bạn gặp bất kỳ vấn đề nào trong quá trình đăng nhập hoặc có bất kỳ câu hỏi nào, vui lòng liên hệ với bộ phận hỗ trợ kỹ thuật của chúng tôi tại {{ENTITY_EMAIL}}</p>
            //             <p>Chân thành cảm ơn sự hợp tác của bạn.</p>
            //             <p>Trân trọng {{SERVICE_FIELD}} {{ENTITY_NAME}}<p>
            //         </footer>',
            //     "status" => 1,
            // ],
        ]);
    }
}
