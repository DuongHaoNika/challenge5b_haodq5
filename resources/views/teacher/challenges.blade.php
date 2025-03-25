<x-layout>
    <header class="header">
        <h1>Challenges</h1>
        <div class="header-actions">
            <div class="search-box">
                <input type="text" placeholder="Tìm kiếm challenge...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <a href="/manage/add-challenge">
                <button class="add-student-btn">
                    <i class="fas fa-plus"></i> Thêm Challenge
                </button>
            </a>
        </div>
    </header>
    <section class="students-table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>File path</th>
                    <th>Submissions</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>/test/com</td>
                    <td><a href="#" class="profile-link">Xem</a></td>
                    <td>
                        <div class="action-buttons">
                            <a href="/manage/edit-challenge">
                                <button class="small-btn edit-btn">Sửa</button>
                            </a>
                            <button class="small-btn delete-btn">Xóa</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>/test/com</td>
                    <td><a href="#" class="profile-link">Xem</a></td>
                    <td>
                        <div class="action-buttons">
                            <button class="small-btn edit-btn">Sửa</button>
                            <button class="small-btn delete-btn">Xóa</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>/test/com</td>
                    <td><a href="#" class="profile-link">Xem</a></td>
                    <td>
                        <div class="action-buttons">
                            <button class="small-btn edit-btn">Sửa</button>
                            <button class="small-btn delete-btn">Xóa</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</x-layout>