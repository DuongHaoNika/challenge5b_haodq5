<x-layout>
    <header class="header">
        <h1>Bài tập của tôi</h1>
    </header>

    <!-- Assignments Table -->
    <section class="assignments-table">
        <table>
            <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Mô tả</th>
                    <th>Deadline</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Thi giữa kỳ</td>
                    <td>20% điểm thành phần</td>
                    <td>2025-04-05 16:37:00</td>
                    <td><span class="status submitted">Đã nộp</span></td>
                    <td class="actions">
                        <a href="#" class="view-btn">Xem lại</a>
                    </td>
                </tr>
                <tr>
                    <td>Bài tập 2</td>
                    <td>Làm để +50% điểm</td>
                    <td>2025-03-31 14:13:00</td>
                    <td><span class="status pending">Chưa nộp</span></td>
                    <td class="actions">
                        <a href="#" class="submit-btn">Nộp bài</a>
                    </td>
                </tr>
                <tr>
                    <td>Bài tập 1</td>
                    <td>100% các sinh viên phải làm</td>
                    <td>2025-03-28 13:41:00</td>
                    <td><span class="status late">Nộp trễ</span></td>
                    <td class="actions">
                        <a href="#" class="view-btn">Xem lại</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</x-layout>