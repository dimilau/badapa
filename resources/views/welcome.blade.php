@extends('layouts.app')

@section('content')
<style>
.intro-text {
    text-align: center;
    padding-top: 200px;
    padding-bottom: 140px;
}
.intro-lead-in {
    font-size: 30px;
}

.intro-heading {
    font-size: 75px;
    font-weight: 700;
    text-align: center;
    font-family: 'Helvetica Neue', Helvetica, sans-serif;    
}

.front-banner {
    background: lightblue;
    background-size: cover;
    position: relative;
    background-color: #34495e;
    color: white;
    text-align: center;
}

.secondary-text {
    text-align: center;
    margin-bottom: 2em;
}

.masthead, .call-to-action {
    position: relative;
    padding-top: 12rem;
    padding-bottom: 12rem;
    font-size: 3rem;
    text-align: center;
    color: white;
    background: url(../images/bg-masthead-2.jpg) no-repeat center center;

}
.masthead .overlay {
    position: absolute;
    background-color: black;
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    opacity: 0.3;    
}

.masthead h1 {
    font-weight: bold;
}

.features-icons {
    padding-top: 7rem;
    padding-bottom: 7rem;
    background-color: #f8f9fa!important;
}

.features-icons h3 {
    color: black;
    font-weight: bold;
}

.features-icons .glyphicon {
    font-size: 4.5rem;
    color: #007bff!important;
}

.row.no-gutters {
  margin-right: 0;
  margin-left: 0;
}
.row.no-gutters > [class^="col-"],
.row.no-gutters > [class*=" col-"] {
  padding-right: 0;
  padding-left: 0;
}

.p-0 {
    padding: 0!important;
}

.showcase {
    background-color: white;
}

.showcase .showcase-img {
    min-height: 40rem;
    background-size: cover;    
}

.col-lg-6 {
    width: 100%;
}

@media (min-width: 992px) {
    .col-lg-6 {
        flex: 0 0 50%;
        width: 50%;
    }
}

.showcase .showcase-text {
    padding: 7rem!important;
    margin-top: auto!important;
    margin-bottom: auto!important;
}

.flex {
    display: flex;
    flex-wrap: wrap;
}

footer.footer {
    padding-top: 4rem;
    padding-bottom: 4rem;
}
</style>

<!-- section 1 -->
<header class="masthead" style="top: -22px;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Improve quality of hire by filtering out those who bring along potential bad intentions into the company!</h1>
            </div>
            <div class="col-md-6 col-md-offset-3">                
                <a class="btn btn-primary" href="{{ route('register') }}" role="button">Register</a>
            </div>
        </div>
    </div>
</header>

<!-- section 2 -->
<section class="features-icons text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div>
                    <span class="glyphicon glyphicon-user"></span>
                    <h3>Improve Quality of Hire</h3>
                    <p>An effective background screening of potential employee can greatly increase the quality of hire in your company staffing efforts. It is crucial to be able to choose your employees correctly. Detailed information of employee's past incidents may provide critical insight to behavioural habits that could pose a threat in the future.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <span class="glyphicon glyphicon-ok-circle"></span>
                    <h3>Improve Safety and Security</h3>
                    <p>Frequent use of employee background checks can help greatly reduce the chance of future workplace violence. This can be achieved through filtering out applicants that could present a threat to the workplace environment. Only through knowing the actual past behaviour we can determine the suitability of our potential candidates.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <span class="glyphicon glyphicon-sort-by-attributes-alt"></span>
                    <h3>Reduce the Risks of Negligent Hiring</h3>
                    <p>It is common to see that many companies failed to do a background search on the employees prior to hiring and such carelessness has lead company to be liable to the wrong doings of their employees. A company could have prevented unnecessary liabilities by knowing more about the past history of the employees. To some certain extend when lawsuits are filed against them, companies often suffer immeasurable damage to their reputation and money because of it.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <span class="glyphicon glyphicon-refresh"></span>
                    <h3>Decrease in Employee Turnover</h3>
                    <p>Background screening of new employees will drastically reduce the rate of unwanted labour turnover. The more companies know about a new hire before an employment offer is ever made, the more companies will reduce their chances of making the wrong hiring decision.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <span class="glyphicon glyphicon-arrow-up"></span>
                    <h3>Improved Regulatory Compliance</h3>
                    <p>Background screening when practise together with in-house compliance expertise, can help companies properly create a screening solution that not only satisfies the industry standards, but also state and federal regulatory requirements. Without this type of background screening program in place, company risks fines and ongoing legal issues.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <span class="glyphicon glyphicon-arrow-up"></span>
                    <h3>Increase Profitability and Reduce Cost</h3>
                    <p>When all necessary controls are in place, employees will be more efficient and effective in carrying out their task without causing disruption to the company. Thus, enabling company to grow through sales increase as well as reducing unnecessary cost.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- section 3 -->
<section class="showcase">
    <div class="container-fluid p-0">
        <div class="row no-gutters flex">
            <div class="col-lg-6 col-md-push-6 showcase-img" style="background-image: url(../images/bad-apple-1.jpg)"></div>
            <div class="col-lg-6 col-md-pull-6 showcase-text my-auto">
                <h2>Uncertainty of Trusting</h2>
                <p>The hard truth faced by most management and employer is the uncertainty of trusting existing employees. Business owners and senior management are constantly taking risk. The uncertainty of trusting employees has prompted many reputable organisations to carry out pre-employment screening.</p>
            </div>
        </div>
        <div class="row no-gutters flex">
            <div class="col-lg-6 showcase-img" style="background-image: url(../images/bad-apple-2.jpg)"></div>
            <div class="col-lg-6 showcase-text my-auto">
                <h2>Uneffective Screening</h2>
                <p>However, the practise of pre-employment screening are often not conducted by small medium enterprise. Moreover, the screening conducted by reputable organisation are not so effective in detecting minor misconduct as well as major misconduct that are not reported.</p>
            </div>
        </div>
        <div class="row no-gutters flex">
        <div class="col-lg-6 col-md-push-6 showcase-img" style="background-image: url(../images/bad-apple-3.jpg)"></div>
        <div class="col-lg-6 col-md-pull-6 showcase-text my-auto">
            <h2>Offender's Misconduct Social Sharing</h2>
            <p>The only way to cope with such threat is by company helping each other through social sharing of offender's misconduct within a secure community platform. Thus, the creation of Bad Apple social sharing platform.</p>
        </div>
    </div>
    </div>
</section>

<section class="call-to-action">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Ready to get started? Sign up now!</h1>
            </div>
            <div class="col-md-6 col-md-offset-3">                
                <a class="btn btn-primary" href="{{ route('register') }}" role="button">Register</a>                
            </div>
        </div>
    </div>
</section>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <p class="text-muted small mb-4 mb-lg-0">© Bad Apple Sdn. Bhd. 2017. All Rights Reserved.</p>
             </div>
        </div>
    </div>
</footer>
@endsection
