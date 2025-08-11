<?php
// Update Houston page with better layout and images
require_once 'wp-load.php';

// Get the page
$page = get_page_by_path('houston-title-loans-sample');
if (!$page) {
    die("Page not found\n");
}

// Create enhanced content with images and better layout
$enhanced_content = '
<!-- Hero Section with Houston Skyline -->
<div style="background: linear-gradient(135deg, #0d4c85 0%, #175ea6 100%); color: white; padding: 80px 20px; text-align: center; margin: -20px -20px 40px -20px; position: relative; overflow: hidden;">
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; opacity: 0.3;">
        <img src="https://images.unsplash.com/photo-1530089711124-9ca31fb9e863?w=1920&h=600&fit=crop" alt="Houston Skyline" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    <div style="position: relative; z-index: 1; max-width: 900px; margin: 0 auto;">
        <h1 style="font-size: 48px; margin-bottom: 20px; font-weight: 700; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">Houston Title Loans - Fast Cash When You Need It Most</h1>
        <p style="font-size: 22px; margin-bottom: 30px; opacity: 0.95;">Get approved in 30 minutes • Same-day funding • Keep driving your car</p>
        <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
            <a href="#apply" style="background: #3ba55c; color: white; padding: 18px 40px; border-radius: 50px; text-decoration: none; font-size: 18px; font-weight: 600; display: inline-block; box-shadow: 0 4px 15px rgba(59, 165, 92, 0.3);">Get Started Now</a>
            <a href="tel:888-224-8177" style="background: white; color: #0d4c85; padding: 18px 40px; border-radius: 50px; text-decoration: none; font-size: 18px; font-weight: 600; display: inline-block;">📞 888-224-8177</a>
        </div>
    </div>
</div>

<!-- Trust Indicators -->
<div style="display: flex; justify-content: space-around; flex-wrap: wrap; gap: 30px; margin-bottom: 60px; padding: 0 20px;">
    <div style="text-align: center; flex: 1; min-width: 200px;">
        <div style="font-size: 36px; color: #3ba55c; font-weight: 700;">$1K-$50K</div>
        <div style="color: #666; margin-top: 8px;">Loan Amounts</div>
    </div>
    <div style="text-align: center; flex: 1; min-width: 200px;">
        <div style="font-size: 36px; color: #3ba55c; font-weight: 700;">30 Min</div>
        <div style="color: #666; margin-top: 8px;">Fast Approval</div>
    </div>
    <div style="text-align: center; flex: 1; min-width: 200px;">
        <div style="font-size: 36px; color: #3ba55c; font-weight: 700;">Same Day</div>
        <div style="color: #666; margin-top: 8px;">Get Your Cash</div>
    </div>
    <div style="text-align: center; flex: 1; min-width: 200px;">
        <div style="font-size: 36px; color: #3ba55c; font-weight: 700;">No Credit</div>
        <div style="color: #666; margin-top: 8px;">Check Required</div>
    </div>
</div>

<!-- Main Content with Images -->
<div style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
    
    <!-- About Section with Image -->
    <div style="display: flex; gap: 40px; align-items: center; margin-bottom: 60px; flex-wrap: wrap;">
        <div style="flex: 1; min-width: 300px;">
            <h2 style="font-size: 36px; margin-bottom: 20px; color: #0d4c85;">Why Houston Residents Choose Our Title Loans</h2>
            <p style="font-size: 18px; line-height: 1.8; color: #555; margin-bottom: 20px;">Houston is America\'s fourth-largest city, home to the world\'s largest medical center, NASA\'s Johnson Space Center, and a thriving energy sector. But even in this dynamic economy, financial challenges can arise.</p>
            <p style="font-size: 18px; line-height: 1.8; color: #555;">Our title loan services are specifically designed for Houston\'s diverse communities, from the Heights to Sugar Land, from Katy to The Woodlands. We understand the unique financial needs of Space City residents.</p>
        </div>
        <div style="flex: 1; min-width: 300px;">
            <img src="https://images.unsplash.com/photo-1594736797933-d0501ba2fe65?w=600&h=400&fit=crop" alt="Houston Texas Downtown" style="width: 100%; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
        </div>
    </div>

    <!-- Benefits Cards -->
    <h2 style="font-size: 36px; text-align: center; margin-bottom: 40px; color: #0d4c85;">Benefits of Our Houston Title Loans</h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-bottom: 60px;">
        
        <div style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); border-top: 4px solid #3ba55c;">
            <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=400&h=200&fit=crop" alt="Fast approval" style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px; margin-bottom: 20px;">
            <h3 style="font-size: 24px; margin-bottom: 15px; color: #0d4c85;">Same-Day Approval & Funding</h3>
            <p style="color: #666; line-height: 1.6;">In a city that never slows down, neither should your access to emergency funds. Our streamlined approval process means Houston residents can often receive their cash the same day they apply.</p>
        </div>

        <div style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); border-top: 4px solid #3ba55c;">
            <img src="https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=400&h=200&fit=crop" alt="Keep your car" style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px; margin-bottom: 20px;">
            <h3 style="font-size: 24px; margin-bottom: 15px; color: #0d4c85;">Keep Driving Your Vehicle</h3>
            <p style="color: #666; line-height: 1.6;">Houston\'s sprawling 665 square miles make a vehicle essential. Unlike selling or pawning your car, with our title loans, you keep driving while using its title as collateral.</p>
        </div>

        <div style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); border-top: 4px solid #3ba55c;">
            <img src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=400&h=200&fit=crop" alt="No credit check" style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px; margin-bottom: 20px;">
            <h3 style="font-size: 24px; margin-bottom: 15px; color: #0d4c85;">No Credit Check Required</h3>
            <p style="color: #666; line-height: 1.6;">Your vehicle\'s value secures the loan, not your credit score. We approve customers with all credit types, including those with poor or no credit history.</p>
        </div>
    </div>

    <!-- How It Works Section with Timeline -->
    <div style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%); padding: 60px 40px; border-radius: 20px; margin-bottom: 60px;">
        <h2 style="font-size: 36px; text-align: center; margin-bottom: 50px; color: #0d4c85;">How Title Loans Work in Houston, TX</h2>
        
        <div style="position: relative; max-width: 800px; margin: 0 auto;">
            <!-- Step 1 -->
            <div style="display: flex; gap: 30px; align-items: flex-start; margin-bottom: 40px;">
                <div style="background: #3ba55c; color: white; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px; font-weight: 600; flex-shrink: 0;">1</div>
                <div>
                    <h3 style="font-size: 20px; margin-bottom: 10px; color: #0d4c85;">Quick Application</h3>
                    <p style="color: #666;">Fill out our simple online form or visit our Houston location. We\'ll need basic information about you and your vehicle.</p>
                </div>
            </div>

            <!-- Step 2 -->
            <div style="display: flex; gap: 30px; align-items: flex-start; margin-bottom: 40px;">
                <div style="background: #3ba55c; color: white; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px; font-weight: 600; flex-shrink: 0;">2</div>
                <div>
                    <h3 style="font-size: 20px; margin-bottom: 10px; color: #0d4c85;">Vehicle Evaluation</h3>
                    <p style="color: #666;">We\'ll assess your vehicle\'s value based on its make, model, year, and condition. Houston\'s preference for trucks and SUVs often means higher loan amounts.</p>
                </div>
            </div>

            <!-- Step 3 -->
            <div style="display: flex; gap: 30px; align-items: flex-start; margin-bottom: 40px;">
                <div style="background: #3ba55c; color: white; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px; font-weight: 600; flex-shrink: 0;">3</div>
                <div>
                    <h3 style="font-size: 20px; margin-bottom: 10px; color: #0d4c85;">Instant Approval</h3>
                    <p style="color: #666;">Once approved, review and sign your loan agreement. We\'ll explain all terms clearly - no hidden fees or surprises.</p>
                </div>
            </div>

            <!-- Step 4 -->
            <div style="display: flex; gap: 30px; align-items: flex-start; margin-bottom: 40px;">
                <div style="background: #3ba55c; color: white; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px; font-weight: 600; flex-shrink: 0;">4</div>
                <div>
                    <h3 style="font-size: 20px; margin-bottom: 10px; color: #0d4c85;">Get Your Cash</h3>
                    <p style="color: #666;">Receive your funds via direct deposit, check, or cash. Most Houston customers get their money within hours.</p>
                </div>
            </div>

            <!-- Step 5 -->
            <div style="display: flex; gap: 30px; align-items: flex-start;">
                <div style="background: #3ba55c; color: white; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px; font-weight: 600; flex-shrink: 0;">5</div>
                <div>
                    <h3 style="font-size: 20px; margin-bottom: 10px; color: #0d4c85;">Keep Your Car</h3>
                    <p style="color: #666;">Drive away in your vehicle with the cash you need. Make payments according to your agreement while maintaining full use of your car.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Requirements Section with Icons -->
    <div style="margin-bottom: 60px;">
        <h2 style="font-size: 36px; text-align: center; margin-bottom: 40px; color: #0d4c85;">Houston Title Loan Requirements</h2>
        <div style="background: white; padding: 40px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.08);">
            <p style="font-size: 18px; text-align: center; margin-bottom: 30px; color: #666;">Getting a title loan in Houston is straightforward. Here\'s what you\'ll need:</p>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 25px;">
                <div style="display: flex; align-items: center; gap: 15px;">
                    <div style="background: #e8f5e9; width: 50px; height: 50px; border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <span style="font-size: 24px;">📋</span>
                    </div>
                    <span style="color: #555;">Clear vehicle title in your name</span>
                </div>
                <div style="display: flex; align-items: center; gap: 15px;">
                    <div style="background: #e8f5e9; width: 50px; height: 50px; border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <span style="font-size: 24px;">🆔</span>
                    </div>
                    <span style="color: #555;">Valid government-issued ID</span>
                </div>
                <div style="display: flex; align-items: center; gap: 15px;">
                    <div style="background: #e8f5e9; width: 50px; height: 50px; border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <span style="font-size: 24px;">🏠</span>
                    </div>
                    <span style="color: #555;">Proof of Houston area residence</span>
                </div>
                <div style="display: flex; align-items: center; gap: 15px;">
                    <div style="background: #e8f5e9; width: 50px; height: 50px; border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <span style="font-size: 24px;">💵</span>
                    </div>
                    <span style="color: #555;">Proof of income or ability to repay</span>
                </div>
                <div style="display: flex; align-items: center; gap: 15px;">
                    <div style="background: #e8f5e9; width: 50px; height: 50px; border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <span style="font-size: 24px;">🚗</span>
                    </div>
                    <span style="color: #555;">Vehicle for inspection</span>
                </div>
                <div style="display: flex; align-items: center; gap: 15px;">
                    <div style="background: #e8f5e9; width: 50px; height: 50px; border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <span style="font-size: 24px;">📱</span>
                    </div>
                    <span style="color: #555;">References (some cases)</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Houston Areas Section with Map Image -->
    <div style="margin-bottom: 60px;">
        <h2 style="font-size: 36px; text-align: center; margin-bottom: 40px; color: #0d4c85;">Serving All Houston Communities</h2>
        
        <div style="display: flex; gap: 40px; align-items: center; flex-wrap: wrap; margin-bottom: 40px;">
            <div style="flex: 1; min-width: 300px;">
                <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc31?w=600&h=400&fit=crop" alt="Houston Map Areas" style="width: 100%; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
            </div>
            <div style="flex: 1; min-width: 300px;">
                <p style="font-size: 18px; line-height: 1.8; color: #555; margin-bottom: 20px;">We proudly serve all of Greater Houston and surrounding areas. Our extensive coverage ensures that no matter where you are in the Houston metro area, fast financial help is available.</p>
                <p style="font-size: 18px; line-height: 1.8; color: #555;">From downtown\'s bustling business district to the family-friendly suburbs of Sugar Land and The Woodlands, we\'re here to serve you.</p>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px;">
            <div style="background: #f8fafc; padding: 25px; border-radius: 10px; border-left: 4px solid #3ba55c;">
                <h3 style="color: #0d4c85; margin-bottom: 15px;">Central Houston</h3>
                <ul style="color: #666; line-height: 1.8; margin: 0; padding-left: 20px;">
                    <li>Downtown - Financial & theater district</li>
                    <li>Midtown - Urban living & nightlife</li>
                    <li>Montrose - Arts & culture hub</li>
                    <li>Museum District - Cultural center</li>
                </ul>
            </div>

            <div style="background: #f8fafc; padding: 25px; border-radius: 10px; border-left: 4px solid #3ba55c;">
                <h3 style="color: #0d4c85; margin-bottom: 15px;">West Houston</h3>
                <ul style="color: #666; line-height: 1.8; margin: 0; padding-left: 20px;">
                    <li>Galleria/Uptown - Shopping district</li>
                    <li>Memorial - Established residential</li>
                    <li>Energy Corridor - Oil & gas HQ</li>
                    <li>Westchase - International business</li>
                </ul>
            </div>

            <div style="background: #f8fafc; padding: 25px; border-radius: 10px; border-left: 4px solid #3ba55c;">
                <h3 style="color: #0d4c85; margin-bottom: 15px;">North Houston</h3>
                <ul style="color: #666; line-height: 1.8; margin: 0; padding-left: 20px;">
                    <li>The Heights - Historic Victorian</li>
                    <li>Spring - Growing suburb</li>
                    <li>The Woodlands - Master-planned</li>
                    <li>Humble - Family-friendly suburb</li>
                </ul>
            </div>

            <div style="background: #f8fafc; padding: 25px; border-radius: 10px; border-left: 4px solid #3ba55c;">
                <h3 style="color: #0d4c85; margin-bottom: 15px;">South Houston</h3>
                <ul style="color: #666; line-height: 1.8; margin: 0; padding-left: 20px;">
                    <li>Medical Center - World\'s largest</li>
                    <li>Pearland - Rapidly growing</li>
                    <li>Clear Lake - NASA & aerospace</li>
                    <li>Sugar Land - Master-planned</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Special Circumstances Section -->
    <div style="background: linear-gradient(135deg, #0d4c85 0%, #175ea6 100%); color: white; padding: 60px 40px; border-radius: 20px; margin-bottom: 60px;">
        <h2 style="font-size: 36px; text-align: center; margin-bottom: 40px;">Understanding Houston\'s Unique Financial Needs</h2>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px;">
            <div>
                <img src="https://images.unsplash.com/photo-1559511020-3eb47b05adf4?w=400&h=250&fit=crop" alt="Hurricane relief" style="width: 100%; height: 250px; object-fit: cover; border-radius: 10px; margin-bottom: 20px;">
                <h3 style="font-size: 24px; margin-bottom: 15px;">Hurricane & Natural Disaster Relief</h3>
                <p style="opacity: 0.95; line-height: 1.6;">Houston residents know the financial strain that hurricanes and flooding can cause. When insurance claims are pending or deductibles are due, our title loans provide immediate relief to help you recover and rebuild.</p>
            </div>

            <div>
                <img src="https://images.unsplash.com/photo-1516849841032-87cbac4d88f7?w=400&h=250&fit=crop" alt="Oil industry" style="width: 100%; height: 250px; object-fit: cover; border-radius: 10px; margin-bottom: 20px;">
                <h3 style="font-size: 24px; margin-bottom: 15px;">Energy Sector Support</h3>
                <p style="opacity: 0.95; line-height: 1.6;">With oil and gas being major employers, industry downturns can affect thousands of Houston families. Our flexible repayment options are designed to accommodate the unique needs of energy sector workers.</p>
            </div>

            <div>
                <img src="https://images.unsplash.com/photo-1584134174917-a78719340975?w=400&h=250&fit=crop" alt="Medical center" style="width: 100%; height: 250px; object-fit: cover; border-radius: 10px; margin-bottom: 20px;">
                <h3 style="font-size: 24px; margin-bottom: 15px;">Medical Emergency Funding</h3>
                <p style="opacity: 0.95; line-height: 1.6;">Home to the world\'s largest medical center, Houston residents often face unexpected medical expenses. Our quick approval process ensures you can focus on health, not finances.</p>
            </div>
        </div>
    </div>

    <!-- Popular Vehicles Section -->
    <div style="margin-bottom: 60px;">
        <h2 style="font-size: 36px; text-align: center; margin-bottom: 40px; color: #0d4c85;">Popular Vehicles for Title Loans in Houston</h2>
        
        <div style="background: white; padding: 40px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.08);">
            <div style="display: flex; gap: 40px; align-items: center; flex-wrap: wrap;">
                <div style="flex: 1; min-width: 300px;">
                    <img src="https://images.unsplash.com/photo-1544636331-e26879cd4d9b?w=600&h=400&fit=crop" alt="Trucks and vehicles" style="width: 100%; border-radius: 10px;">
                </div>
                <div style="flex: 1; min-width: 300px;">
                    <p style="font-size: 18px; color: #555; margin-bottom: 20px;">Houston\'s love for trucks and SUVs often translates to higher loan amounts. Our competitive rates are regulated by Texas state law, ensuring fair lending practices.</p>
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px;">
                        <div style="padding: 10px; background: #f8fafc; border-radius: 8px;">✓ Ford F-150</div>
                        <div style="padding: 10px; background: #f8fafc; border-radius: 8px;">✓ Chevrolet Silverado</div>
                        <div style="padding: 10px; background: #f8fafc; border-radius: 8px;">✓ Toyota Camry</div>
                        <div style="padding: 10px; background: #f8fafc; border-radius: 8px;">✓ Honda Accord</div>
                        <div style="padding: 10px; background: #f8fafc; border-radius: 8px;">✓ Nissan Altima</div>
                        <div style="padding: 10px; background: #f8fafc; border-radius: 8px;">✓ Jeep Grand Cherokee</div>
                        <div style="padding: 10px; background: #f8fafc; border-radius: 8px;">✓ RAM 1500</div>
                        <div style="padding: 10px; background: #f8fafc; border-radius: 8px;">✓ Toyota Tacoma</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div style="margin-bottom: 60px;">
        <h2 style="font-size: 36px; text-align: center; margin-bottom: 40px; color: #0d4c85;">Frequently Asked Questions</h2>
        
        <div style="background: white; padding: 40px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.08);">
            <div style="margin-bottom: 30px; padding-bottom: 30px; border-bottom: 1px solid #e2e8f0;">
                <h3 style="color: #0d4c85; margin-bottom: 15px; font-size: 20px;">Can I get a title loan if I\'m still making payments on my vehicle?</h3>
                <p style="color: #666; line-height: 1.6;">In some cases, yes. If you have sufficient equity in your vehicle, we may be able to help even if you haven\'t completely paid off your auto loan.</p>
            </div>

            <div style="margin-bottom: 30px; padding-bottom: 30px; border-bottom: 1px solid #e2e8f0;">
                <h3 style="color: #0d4c85; margin-bottom: 15px; font-size: 20px;">How quickly can I get money in Houston?</h3>
                <p style="color: #666; line-height: 1.6;">Most approved applicants receive their funds the same business day. Our Houston location is equipped for rapid processing and immediate funding.</p>
            </div>

            <div style="margin-bottom: 30px; padding-bottom: 30px; border-bottom: 1px solid #e2e8f0;">
                <h3 style="color: #0d4c85; margin-bottom: 15px; font-size: 20px;">What if I have bad credit?</h3>
                <p style="color: #666; line-height: 1.6;">Title loans are secured by your vehicle, not your credit score. We approve customers with all credit types, including those with poor or no credit history.</p>
            </div>

            <div style="margin-bottom: 30px; padding-bottom: 30px; border-bottom: 1px solid #e2e8f0;">
                <h3 style="color: #0d4c85; margin-bottom: 15px; font-size: 20px;">Do you accept motorcycles or RVs?</h3>
                <p style="color: #666; line-height: 1.6;">Yes! We accept cars, trucks, SUVs, motorcycles, RVs, and even commercial vehicles. If it has a clear title, we can likely help.</p>
            </div>

            <div>
                <h3 style="color: #0d4c85; margin-bottom: 15px; font-size: 20px;">What areas of Houston do you serve?</h3>
                <p style="color: #666; line-height: 1.6;">We serve all of Harris County and surrounding areas, including Fort Bend, Montgomery, Brazoria, and Galveston counties.</p>
            </div>
        </div>
    </div>

    <!-- Final CTA Section -->
    <div id="apply" style="background: linear-gradient(135deg, #3ba55c 0%, #66bb6a 100%); color: white; padding: 60px 40px; border-radius: 20px; text-align: center; margin-bottom: 40px;">
        <h2 style="font-size: 36px; margin-bottom: 20px;">Apply for Your Houston Title Loan Today</h2>
        <p style="font-size: 20px; margin-bottom: 30px; opacity: 0.95;">Don\'t let financial stress overwhelm you. Houston\'s trusted title loan provider is here to help with fast, friendly service and competitive rates.</p>
        <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
            <a href="#" style="background: white; color: #3ba55c; padding: 18px 40px; border-radius: 50px; text-decoration: none; font-size: 18px; font-weight: 600; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">Apply Online Now</a>
            <a href="tel:888-224-8177" style="background: transparent; color: white; padding: 18px 40px; border-radius: 50px; text-decoration: none; font-size: 18px; font-weight: 600; display: inline-block; border: 2px solid white;">📞 Call 888-224-8177</a>
        </div>
        <p style="margin-top: 30px; font-size: 16px; opacity: 0.9;">Whether you\'re in River Oaks or Fifth Ward, Bellaire or Pasadena, we\'re ready to serve you.</p>
    </div>

    <!-- Disclaimer -->
    <div style="background: #f8fafc; padding: 20px; border-radius: 10px; text-align: center;">
        <p style="font-size: 14px; color: #888; line-height: 1.6;"><small>Title loans are regulated by Texas state law. Rates, terms, and availability subject to approval and may vary based on creditworthiness, vehicle value, and ability to repay. Not all applicants will qualify. See store for details.</small></p>
    </div>
</div>
';

// Update the page
wp_update_post([
    'ID' => $page->ID,
    'post_content' => $enhanced_content
]);

echo "Page updated successfully with enhanced layout and images!\n";
echo "View at: " . get_permalink($page->ID) . "\n";