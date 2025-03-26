<x-layout>
    <header class="header">
        <h1>Danh sách Bài Tập của Bạn</h1>
        <div class="header-actions">
            <a href="/manage/add-assignment">
                <button class="add-assignment-btn">
                    <i class="fas fa-plus"></i> Thêm bài tập
                </button>
            </a>
        </div>
    </header>

    <!-- Assignments Table -->
    <section class="assignments-table">
        <table>
            <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Deadline</th>
                    <th>Thao tác</th>
                    <th>Submissions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Thi giữa kỳ</td>
                    <td>2025-04-05 16:37:00</td>
                    <td>
                        <div class="action-buttons">
                            <a href="/manage/edit-assignment">
                                <button class="small-btn edit-btn">Sửa</button>
                            </a>
                            <button class="small-btn delete-btn">Xóa</button>
                        </div>
                    </td>
                    <td><a href="#" class="view-submissions">Xem bài làm</a></td>
                </tr>
                <tr>
                    <td>Bài tập 2</td>
                    <td>2025-03-31 14:13:00</td>
                    <td>
                        <div class="action-buttons">
                            <button class="small-btn edit-btn">Sửa</button>
                            <button class="small-btn delete-btn">Xóa</button>
                        </div>
                    </td>
                    <td><a href="#" class="view-submissions">Xem bài làm</a></td>
                </tr>
                <tr>
                    <td>Bài tập 1</td>
                    <td>2025-03-28 13:41:00</td>
                    <td>
                        <div class="action-buttons">
                            <button class="small-btn edit-btn">Sửa</button>
                            <button class="small-btn delete-btn">Xóa</button>
                        </div>
                    </td>
                    <td><a href="#" class="view-submissions">Xem bài làm</a></td>
                </tr>
            </tbody>
        </table>
    </section>
</x-layout>