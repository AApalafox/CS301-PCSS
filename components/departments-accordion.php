<div class="accordion accordion-flush row p-4" id="accordionExample">
  <div class="col accordion-head">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Accordion Item #1
      </button>
    </h2>
  </div>
  <div class="col accordion-head">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Accordion Item #2
      </button>
    </h2>
  </div>
  <div class="col accordion-head">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Accordion Item #3
      </button>
    </h2>
  </div>
  <div class="col accordion-head">
    <h2 class="accordion-header" id="headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
        Accordion Item #4
      </button>
    </h2>
  </div>
  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
    <div class="accordion-body shadow-sm row">
      <div class="mb-3">
        <div class="row g-0">
          <div class="col-md-3 pt-3">
            <img src="assets/img/sample-service.jpg" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <?php include 'components/department-cards.php'; ?>
            </div>
          </div>
        </div>
      </div> <!-- end of card container -->
    </div> <!-- end of accordion body container -->

  </div>
  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
    <div class="accordion-body shadow-sm">
      <div class="mb-3">
        <div class="row g-0">
          <div class="col-md-3 pt-3">
            <img src="assets/img/sample-service.jpg" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <?php include 'components/department-cards.php'; ?>
            </div>
          </div>
        </div>
      </div> <!-- end of card container -->
    </div>
  </div>
  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
    <div class="accordion-body shadow-sm">
      <div class="mb-3">
        <div class="row g-0">
          <div class="col-md-3 pt-3">
            <img src="assets/img/sample-service.jpg" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <?php include 'components/department-cards.php'; ?>
            </div>
          </div>
        </div>
      </div> <!-- end of card container -->
    </div>
  </div>
  <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
    <div class="accordion-body shadow-sm">
      <div class="mb-3">
        <div class="row g-0">
          <div class="col-md-3 pt-3">
            <img src="assets/img/sample-service.jpg" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <?php include 'components/department-cards.php'; ?>
            </div>
          </div>
        </div>
      </div> <!-- end of card container -->
    </div>
  </div>
</div>