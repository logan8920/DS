<style>
    /* SIDEBAR */
   .sidebar {
        border: 1px solid #e3dada;
        border-top: none;
        width: 250px;
        height: 100vh;
        /* background: #1f1f1f; */
        position: fixed;
        top: 0;
        left: 0;
        color: #fff;
        transition: width .3s;
        overflow-y: auto;
    }

    .sidebar.collapsed {
        width: 70px;
    }

    .sidebar .logo {
        padding: 20px 10px;
        text-align: center;
    }

    .sidebar a {
        margin: 10px 8px 4px 10px;
        color: #000000;
        font-weight: 600;
        display: flex;
        padding: 12px 0px 12px 13px;
        text-decoration: none;
        border-radius: 12px;
        border: 1px solid #d1d1d1;
        align-items: center;
        /* background: #b12424; */
    }

    .sidebar a:hover {
        background: #ff3232;
        color: #fff;
        font-weight: 600;
        border: none;
    }

    .sidebar .menu-text {
        margin-left: 10px;
    }

    .sidebar.collapsed .menu-text {
        display: none;
    }

    /* CONTENT & HEADER — aligned same margin */
    .wrapper {
        margin-left: 250px;
        transition: margin-left .3s;
        padding: 20px;
    }

    .wrapper.collapsed {
        margin-left: 70px;
    }

    /* HEADER inside wrapper */
    .page-header {
        border: 1px solid #e3dada;
        background: #fff;
        padding: 12px 20px;
        border-radius: 6px;
        box-shadow: 0 2px 5px #0001;
        margin-bottom: 20px;
    }
    div.main {
        box-shadow: 0 2px 5px #0001;
        border: 1px solid #e3dada;
        border-radius: 10px 0px 0 0px;
        padding: 13px;
        border-right: none;
    }
</style>

<div id="sidebar" class="sidebar">

    <div class="logo" style="cursor: pointer;" onclick="window.location.href = `{{ route('dashboard') }}`">
        <img src="{{asset('assets/brand_logo_hor.png')}}" class="l-logo" height="40">
        <img src="{{asset('assets/brand_icon.png') }}" class="s-logo d-none" width="40">
    </div>

    <a href="{{ route('dashboard') }}"><i>🏠</i> <span class="menu-text">Home</span></a>
    <a href="{{ route('analytics') }}"><i>📊</i> <span class="menu-text">Analytics</span></a>
    <a href="{{ route('orders') }}"><i>📦</i> <span class="menu-text">Orders</span></a>
    <a href="{{ route('shipment.index') }}"><i>🚚</i> <span class="menu-text">Shipment</span></a>

    <!-- <strong class="menu-text ml-3 mt-3">RTO</strong> -->
    <a href="{{ route('rtointelligence.rtofaqs') }}"><i>❓</i> <span class="menu-text">RTO FAQs</span></a>
    <a href="{{ route('rtointelligence.highrtopincodelist') }}"><i>📍</i> <span class="menu-text">High RTO Pincode</span></a>
    <a href="{{ route('ndr.index') }}"><i>📍</i> <span class="menu-text">NDR</span></a>
    <!-- <strong class="text-black ml-3 mt-3">Billing</strong> -->
    <a href="{{ route('billing.marginremittance') }}"><i>💳</i> <span class="menu-text">Margin Remittance</span></a>
    <a href="{{ route('billing.prepaidpayment') }}"><i>💰</i> <span class="menu-text">Prepaid Payment</span></a>
    <a href="{{ route('channels.allChannels') }}"><i>💳</i> <span class="menu-text">Channels</span></a>
</div>

<script async>
    document.addEventListener("DOMContentLoaded",function name() {
        const toggleBtn = document.getElementById("toggleSidebar");
        const sidebar = document.getElementById("sidebar");
        const wrapper = document.getElementById("wrapper");
        toggleBtn.onclick = () => {
            sidebar.classList.toggle("collapsed");
            wrapper.classList.toggle("collapsed");
            let img = sidebar.children[0].children;
            [...img].forEach(image => image.classList.add('d-none'));
            if(sidebar.classList.contains('collapsed')){
                img[1].classList.remove('d-none');
            }else{
                img[0].classList.remove('d-none');
            }
        };
    });
</script>