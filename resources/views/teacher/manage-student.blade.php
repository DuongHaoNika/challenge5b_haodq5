<x-layout>
    <header class="header">
        <h1>Quản lý sinh viên</h1>
        <div class="header-actions">
            <div class="search-box">
                <input type="text" placeholder="Tìm kiếm sinh viên...">
                <button><i class="fas fa-search"></i></button>
            </div>
        </div>
    </header>
    <section class="students-table">
        <table>
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Profile</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Bùi Công Bắc</td>
                    <td>student4@example.com</td>
                    <td><a href="#" class="profile-link">Profile</a></td>
                    <td>
                        <div class="action-buttons">
                            <button class="small-btn edit-btn">Sửa</button>
                            <button class="small-btn delete-btn">Xóa</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Dương Quang Hào</td>
                    <td>student5@example.com</td>
                    <td><a href="#" class="profile-link">Profile</a></td>
                    <td>
                        <div class="action-buttons">
                            <button class="small-btn edit-btn">Sửa</button>
                            <button class="small-btn delete-btn">Xóa</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Student One</td>
                    <td>student1@example.com</td>
                    <td><a href="#" class="profile-link">Profile</a></td>
                    <td>
                        <div class="action-buttons">
                            <button class="small-btn edit-btn">Sửa</button>
                            <button class="small-btn delete-btn">Xóa</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Student Three</td>
                    <td>student3@example.com</td>
                    <td><a href="#" class="profile-link">Profile</a></td>
                    <td>
                        <div class="action-buttons">
                            <button class="small-btn edit-btn">Sửa</button>
                            <button class="small-btn delete-btn">Xóa</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Student Two</td>
                    <td>student2@example.com</td>
                    <td><a href="#" class="profile-link">Profile</a></td>
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