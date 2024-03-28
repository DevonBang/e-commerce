<input type="checkbox" id="check">
    <label for="check">
        <i class="bi-card-text" id="btn"></i>
        <i class="bi-arrows-angle-contract" id="cancel"></i>
    </label>
    <div class="sidebar">
        <header>
            <ul>
                <img src="foto.png" alt="" width="30" height="30" style="border-radius: .8rem; justify-content: center;">
                <strong>User</strong>
            </ul>
        </header>
        <ul>
            <hr class="dropdown-divider">
            <li><a href="#"><i class="bi-list"></i>List Pesanan</a></li>
            <li><a href="#"><i class="bi-clock"></i>History</a></li>
            <li><a href="#"><i class="bi-card-text"></i>Edit Profile</a></li>
            <li><a href="{{ route('home') }}"><i class="bi-arrow-left"></i>Back</a></li>
            <hr class="dropdown-divider" style="margin-top: 200px;">
            <li><a href="#"><i class="bi-door-closed"></i>Log Out</li>
        </ul>                    
    </div>