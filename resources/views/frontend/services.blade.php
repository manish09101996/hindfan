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

            <div class="row g-4">
                <!-- 1. Pedestal Fan Line -->
                <div class="col-lg-6">
                    <div class="p-4 p-md-5 bg-light rounded-4 border h-100 d-flex flex-column">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="service-icon-box mb-0">
                                <i class="fa fa-fan"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold mb-1">Heavy Duty Pedestal Fans</h3>
                                <span class="badge bg-danger">Sweeps: 21", 23", 26"</span>
                            </div>
                        </div>
                        <p class="text-muted mb-4">
                            Engineered for wedding palaces, workshops, banquet lawns, and farm sheds. Equipped with 1400 RPM pure copper motors, dual heavy-duty ball bearings, and aerodynamic aluminium blades.
                        </p>
                        <div class="table-responsive bg-white rounded-3 p-3 border mb-4">
                            <table class="table table-sm table-borderless mb-0">
                                <tbody>
                                    <tr><th class="text-secondary" style="width: 40%;">Available Models:</th><td>CHIDHI 21", CHIDHI Special, DABBI 21", 23", 26"</td></tr>
                                    <tr><th class="text-secondary">Motor Type:</th><td>100% Pure Electrolytic Copper Winding</td></tr>
                                    <tr><th class="text-secondary">Speed &amp; Bearings:</th><td>1400 RPM • Dual Heavy-Duty Ball Bearings</td></tr>
                                    <tr><th class="text-secondary">Power Range:</th><td>150W - 240W (Thermal Resistant)</td></tr>
                                    <tr><th class="text-secondary">Blades:</th><td>Dynamically Balanced Aerodynamic Aluminium</td></tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-auto d-flex flex-wrap gap-2">
                            <a href="{{ route('portfolio', ['category' => 'pedestal-fans']) }}" class="btn-modern btn-primary-modern flex-grow-1">
                                View Pedestal Models <i class="fa fa-arrow-right ms-1"></i>
                            </a>
                            <a href="{{ whatsapp_url('Hello Hindson Industries, I would like to inquire about Pedestal Fans.') }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-whatsapp px-3" title="Chat on WhatsApp">
                                <i class="fab fa-whatsapp fs-5"></i>
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
                                    <tr><th class="text-secondary" style="width: 40%;">Models:</th><td>ELEGANT (3-5 kg), HEAVY (15-20 kg), SUPREME (25-30 kg), SAMRAT (40-50 kg), MAJESTIC (70-80 kg)</td></tr>
                                    <tr><th class="text-secondary">Power Range:</th><td>70 Watts to 160 Watts Continuous Duty</td></tr>
                                    <tr><th class="text-secondary">Spinor Sizes:</th><td>6" to 12" Food-Grade Stainless Steel Spinor</td></tr>
                                    <tr><th class="text-secondary">Motor Duty:</th><td>100% Pure Copper Magnet Wire</td></tr>
                                    <tr><th class="text-secondary">Application:</th><td>Domestic, Commercial Dairies, Milk Chilling Centers</td></tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-auto d-flex flex-wrap gap-2">
                            <a href="{{ route('portfolio', ['category' => 'madhani-churners']) }}" class="btn-modern btn-primary-modern flex-grow-1">
                                View Madhani Models <i class="fa fa-arrow-right ms-1"></i>
                            </a>
                            <a href="{{ whatsapp_url('Hello Hindson Industries, I would like to inquire about Electrical Madhani Churners.') }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-whatsapp px-3" title="Chat on WhatsApp">
                                <i class="fab fa-whatsapp fs-5"></i>
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
                                    <tr><th class="text-secondary" style="width: 40%;">Guard Grill:</th><td>Heavy Duty (4 kg) Reinforced Steel Wire</td></tr>
                                    <tr><th class="text-secondary">Clamps:</th><td>Solid steel pipe clamps for rapid event mounting</td></tr>
                                    <tr><th class="text-secondary">Power &amp; RPM:</th><td>160W - 240W • 1400 RPM Double Bearing Motor</td></tr>
                                    <tr><th class="text-secondary">Air Throw:</th><td>Ultra-long high-velocity throw for crowded gatherings</td></tr>
                                    <tr><th class="text-secondary">Target Sectors:</th><td>Wedding Pandal Decorators, Religious Gatherings, Poultry</td></tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-auto d-flex flex-wrap gap-2">
                            <a href="{{ route('portfolio', ['category' => 'tent-event-fans']) }}" class="btn-modern btn-primary-modern flex-grow-1">
                                View Tent Models <i class="fa fa-arrow-right ms-1"></i>
                            </a>
                            <a href="{{ whatsapp_url('Hello Hindson Industries, I would like to inquire about Tent & Event Clump Fans.') }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-whatsapp px-3" title="Chat on WhatsApp">
                                <i class="fab fa-whatsapp fs-5"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 4. Industrial Wall & Bracket Fans -->
                <div class="col-lg-6">
                    <div class="p-4 p-md-5 bg-light rounded-4 border h-100 d-flex flex-column">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="service-icon-box mb-0">
                                <i class="fa fa-arrows-to-dot"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold mb-1">Industrial Wall &amp; Bracket Fans</h3>
                                <span class="badge bg-dark">Sizes: 21", 23", 26", 30"</span>
                            </div>
                        </div>
                        <p class="text-muted mb-4">
                            Space-saving industrial wall circulators featuring solid wall mounting brackets and wide motorized oscillation coverage. Perfect for manufacturing floors, warehouses, and gymnasiums.
                        </p>
                        <div class="table-responsive bg-white rounded-3 p-3 border mb-4">
                            <table class="table table-sm table-borderless mb-0">
                                <tbody>
                                    <tr><th class="text-secondary" style="width: 40%;">Sweep Range:</th><td>21", 23", 26", and 30" (530mm to 750mm)</td></tr>
                                    <tr><th class="text-secondary">Mounting:</th><td>Heavy-gauge powder coated wall bracket base</td></tr>
                                    <tr><th class="text-secondary">Oscillation:</th><td>Wide angle horizontal oscillation with locking lever</td></tr>
                                    <tr><th class="text-secondary">Motor Winding:</th><td>100% Copper Winding with Overload Protection</td></tr>
                                    <tr><th class="text-secondary">Applications:</th><td>Factories, Workshops, Packing Halls, Community Centers</td></tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-auto d-flex flex-wrap gap-2">
                            <a href="{{ route('portfolio', ['category' => 'wall-mounting-fans']) }}" class="btn-modern btn-primary-modern flex-grow-1">
                                View Wall Models <i class="fa fa-arrow-right ms-1"></i>
                            </a>
                            <a href="{{ whatsapp_url('Hello Hindson Industries, I would like to inquire about Wall & Bracket Fans.') }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-whatsapp px-3" title="Chat on WhatsApp">
                                <i class="fab fa-whatsapp fs-5"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 5. Commercial Water Mist Fans -->
                <div class="col-lg-6">
                    <div class="p-4 p-md-5 bg-light rounded-4 border h-100 d-flex flex-column">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="service-icon-box mb-0">
                                <i class="fa fa-droplet"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold mb-1">Commercial Water Mist Fans</h3>
                                <span class="badge bg-info text-dark">Cooling Capacity: 45 Liters</span>
                            </div>
                        </div>
                        <p class="text-muted mb-4">
                            Heavy-duty 26-inch outdoor misting fans with centrifugal atomization discs. Drops ambient temperatures by 4°C to 8°C without nozzles clogging.
                        </p>
                        <div class="table-responsive bg-white rounded-3 p-3 border mb-4">
                            <table class="table table-sm table-borderless mb-0">
                                <tbody>
                                    <tr><th class="text-secondary" style="width: 40%;">Sweep Size:</th><td>26 Inch (650 mm) Heavy Aerodynamic Blades</td></tr>
                                    <tr><th class="text-secondary">Water Reservoir:</th><td>45 Liters high-capacity bottom tank</td></tr>
                                    <tr><th class="text-secondary">Misting Method:</th><td>Centrifugal non-clogging disc atomization</td></tr>
                                    <tr><th class="text-secondary">Cooling Effect:</th><td>Reduces ambient temperature by up to 8°C</td></tr>
                                    <tr><th class="text-secondary">Ideal For:</th><td>Outdoor Restaurants, Resorts, Open Lawns, Summer Events</td></tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-auto d-flex flex-wrap gap-2">
                            <a href="{{ route('portfolio', ['category' => 'water-mist-fans']) }}" class="btn-modern btn-primary-modern flex-grow-1">
                                View Mist Models <i class="fa fa-arrow-right ms-1"></i>
                            </a>
                            <a href="{{ whatsapp_url('Hello Hindson Industries, I would like to inquire about Water Mist Cooling Fans.') }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-whatsapp px-3" title="Chat on WhatsApp">
                                <i class="fab fa-whatsapp fs-5"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 6. 110 Dia Cooler Motors -->
                <div class="col-lg-6">
                    <div class="p-4 p-md-5 bg-light rounded-4 border h-100 d-flex flex-column">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="service-icon-box mb-0">
                                <i class="fa fa-gears"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold mb-1">110 Dia Cooler Motors</h3>
                                <span class="badge bg-secondary">Precision Stacks</span>
                            </div>
                        </div>
                        <p class="text-muted mb-4">
                            Precision-wound 110 Dia copper cooler motors crafted with supreme-grade silicon laminations and heavy ball bearings for desert cooler manufacturers and retailers.
                        </p>
                        <div class="table-responsive bg-white rounded-3 p-3 border mb-4">
                            <table class="table table-sm table-borderless mb-0">
                                <tbody>
                                    <tr><th class="text-secondary" style="width: 40%;">Stack Heights:</th><td>1", 1-1/4", 1-1/2", and 1-3/4" Stacks</td></tr>
                                    <tr><th class="text-secondary">Motor Winding:</th><td>100% Pure Electrolytic Copper Magnet Wire</td></tr>
                                    <tr><th class="text-secondary">Shaft &amp; Bearing:</th><td>Ground carbon-steel shaft with dual ball bearings</td></tr>
                                    <tr><th class="text-secondary">Performance:</th><td>High starting torque, low power drain, silent run</td></tr>
                                    <tr><th class="text-secondary">Distribution:</th><td>Supplied to Cooler Manufacturers &amp; Spare Parts Wholesalers</td></tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-auto d-flex flex-wrap gap-2">
                            <a href="{{ route('portfolio', ['category' => 'cooler-motors']) }}" class="btn-modern btn-primary-modern flex-grow-1">
                                View Cooler Motors <i class="fa fa-arrow-right ms-1"></i>
                            </a>
                            <a href="{{ whatsapp_url('Hello Hindson Industries, I would like to inquire about 110 Dia Cooler Motors.') }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-whatsapp px-3" title="Chat on WhatsApp">
                                <i class="fab fa-whatsapp fs-5"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2026 Product Brochure Download Callout -->
            <div class="mt-5 p-4 p-md-5 bg-light rounded-4 border text-center shadow-sm">
                <span class="badge bg-danger-subtle text-danger fw-bold px-3 py-2 rounded-pill mb-3">NEW 2026 EDITION</span>
                <h3 class="fw-bold mb-2">Download Official Hindson Industries Product Brochure 2026</h3>
                <p class="text-muted mb-4 max-w-600 mx-auto" style="max-width: 650px;">
                    Get our comprehensive 31-page technical guide with full specifications, electrical ratings, dimensions, and dealer guidelines for all fans, churners, and motors.
                </p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="{{ asset('assets/images/Brochure/Brochure 2026.pdf') }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-primary-modern">
                        <i class="fa fa-eye me-2"></i> View Brochure
                    </a>
                    <a href="{{ asset('assets/images/Brochure/Brochure 2026.pdf') }}" download="Hindson_Industries_Brochure_2026.pdf" class="btn-modern btn-dark-modern">
                        <i class="fa fa-download me-2"></i> Download Brochure
                    </a>
                    <a href="{{ route('brochure') }}" class="btn-modern btn-outline-dark-modern">
                        <i class="fa fa-book-open me-2"></i> Brochure Details
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
