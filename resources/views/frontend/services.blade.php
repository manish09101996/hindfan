@extends('layouts.app')

@section('content')
    <!-- Page Header -->
    <section class="py-5 bg-dark text-white position-relative overflow-hidden">
        <div class="hero-pattern"></div>
        <div class="container position-relative py-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Products &amp; Services</li>
                </ol>
            </nav>
            <h1 class="display-5 fw-bold text-white mb-2">Industrial Products &amp; Services</h1>
            <p class="lead text-white-50 mb-0">Explore our comprehensive catalog of commercial ventilation systems and dairy machinery.</p>
        </div>
    </section>

    <!-- Product Line Showcase -->
    <section class="py-5 bg-white">
        <div class="container py-lg-4">
            <div class="text-center mb-5">
                <span class="section-tag">
                    <i class="fa fa-boxes-stacked"></i> Complete Catalog
                </span>
                <h2 class="section-title">Engineered For Reliability</h2>
                <p class="section-desc">Each product category is precision built in our Punjab facility to withstand high ambient temperatures and demanding duty cycles.</p>
            </div>

            <div class="row g-5">
                <!-- 1. Pedestal Fan Line -->
                <div class="col-lg-6">
                    <div class="p-4 p-md-5 bg-light rounded-4 border h-100 d-flex flex-column">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="service-icon-box mb-0">
                                <i class="fa fa-fan"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold mb-1">Pedestal Fan Series</h3>
                                <span class="badge bg-primary">Sweep: 21", 23", 26"</span>
                            </div>
                        </div>
                        <p class="text-muted mb-4">
                            Engineered for wedding palaces, workshops, banquet lawns, and farm sheds. Equipped with 1400 RPM pure copper motors, dual heavy-duty ball bearings, and aerodynamic aluminium blades.
                        </p>
                        <div class="table-responsive bg-white rounded-3 p-3 border mb-4">
                            <table class="table table-sm table-borderless mb-0">
                                <tbody>
                                    <tr><th class="text-secondary">Available Models:</th><td>CHIDHI 21", CHIDHI Special, DABBI 21", 23", 26"</td></tr>
                                    <tr><th class="text-secondary">Motor Type:</th><td>100% Pure Electrolytic Copper Winding</td></tr>
                                    <tr><th class="text-secondary">Speed:</th><td>1400 RPM (High Velocity Air Throw)</td></tr>
                                    <tr><th class="text-secondary">Power Consumption:</th><td>150W - 240W</td></tr>
                                    <tr><th class="text-secondary">Blade:</th><td>Heavy Gauge Aerodynamic Aluminium</td></tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-auto">
                            <a href="{{ route('portfolio', ['category' => 'pedestal-fans']) }}" class="btn-modern btn-primary-modern w-100">
                                Explore Pedestal Fans in Portfolio <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 2. Madhani & Churners -->
                <div class="col-lg-6">
                    <div class="p-4 p-md-5 bg-light rounded-4 border h-100 d-flex flex-column">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="service-icon-box mb-0">
                                <i class="fa fa-blender"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold mb-1">Electrical Madhani Churners</h3>
                                <span class="badge bg-warning text-dark">Capacity: 3 KG to 80 KG</span>
                            </div>
                        </div>
                        <p class="text-muted mb-4">
                            The household name across Punjab and dairy cooperatives. Delivers effortless butter and buttermilk separation with pure copper high-torque drive.
                        </p>
                        <div class="table-responsive bg-white rounded-3 p-3 border mb-4">
                            <table class="table table-sm table-borderless mb-0">
                                <tbody>
                                    <tr><th class="text-secondary">Models:</th><td>ELEGANT (3-5 kg), HEAVY (15-20 kg), SUPREME (25-30 kg), SAMRAT (40-50 kg), MAJESTIC (70-80 kg)</td></tr>
                                    <tr><th class="text-secondary">Power Range:</th><td>70 Watts to 160 Watts</td></tr>
                                    <tr><th class="text-secondary">Spinor Sizes:</th><td>6" to 12" Food-Grade Stainless Spinor</td></tr>
                                    <tr><th class="text-secondary">Motor Duty:</th><td>Continuous Heavy-Duty Copper</td></tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-auto">
                            <a href="{{ route('portfolio', ['category' => 'madhani-churners']) }}" class="btn-modern btn-primary-modern w-100">
                                Explore Madhani Models in Portfolio <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 3. Tent & Clump Fans -->
                <div class="col-lg-6">
                    <div class="p-4 p-md-5 bg-light rounded-4 border h-100 d-flex flex-column">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="service-icon-box mb-0">
                                <i class="fa fa-tent"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold mb-1">Tent &amp; Event Clump Fans</h3>
                                <span class="badge bg-success">Sizes: 21", 26"</span>
                            </div>
                        </div>
                        <p class="text-muted mb-4">
                            Known as the rugged "Tent Fratta Fan". Features specialized heavy pipe clumps for swift installation onto tent pillars, event scaffolding, and poultry sheds. Includes a 4 kg reinforced guard grill.
                        </p>
                        <div class="table-responsive bg-white rounded-3 p-3 border mb-4">
                            <table class="table table-sm table-borderless mb-0">
                                <tbody>
                                    <tr><th class="text-secondary">Guard Grill:</th><td>Heavy Duty (4 kg) with safety spacing</td></tr>
                                    <tr><th class="text-secondary">Clumps:</th><td>Customizable pipe clamps for quick fastening</td></tr>
                                    <tr><th class="text-secondary">Power:</th><td>160 Watts to 240 Watts</td></tr>
                                    <tr><th class="text-secondary">Speed:</th><td>1400 RPM Double Bearing Motor</td></tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-auto">
                            <a href="{{ route('portfolio', ['category' => 'tent-event-fans']) }}" class="btn-modern btn-primary-modern w-100">
                                Explore Tent Fans in Portfolio <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 4. Water Mist & Wall Fans -->
                <div class="col-lg-6">
                    <div class="p-4 p-md-5 bg-light rounded-4 border h-100 d-flex flex-column">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="service-icon-box mb-0">
                                <i class="fa fa-droplet"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold mb-1">Water Mist &amp; Wall Fans</h3>
                                <span class="badge bg-primary">Cooling &amp; Mounting</span>
                            </div>
                        </div>
                        <p class="text-muted mb-4">
                            26-inch mist fan with integrated 45-liter water reservoir for outdoor dining and exhibitions. Wall and articulated bracket fans in 21", 23", 26", and 30" sweeps.
                        </p>
                        <div class="table-responsive bg-white rounded-3 p-3 border mb-4">
                            <table class="table table-sm table-borderless mb-0">
                                <tbody>
                                    <tr><th class="text-secondary">Mist Fan Tank:</th><td>45 Liters Water Capacity</td></tr>
                                    <tr><th class="text-secondary">Mist Drop Temp:</th><td>Reduces ambient temperature by 4°C to 8°C</td></tr>
                                    <tr><th class="text-secondary">Wall Fan Sizes:</th><td>21", 23", 26", 30" Heavy Wall Brackets</td></tr>
                                    <tr><th class="text-secondary">Cooler Motors:</th><td>110 Dia Series (1", 1.25", 1.5", 1.75")</td></tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-auto">
                            <a href="{{ route('portfolio', ['category' => 'water-mist-fans']) }}" class="btn-modern btn-primary-modern w-100">
                                Explore Mist Fans in Portfolio <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
