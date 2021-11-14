<div class="accordion accordion-flush row" id="accordionExample">
  <div class="col accordion-head">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Pathology
      </button>
    </h2>
  </div>
  <div class="col accordion-head">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Nursing
      </button>
    </h2>
  </div>
  <div class="col accordion-head">
    <h2 class="accordion-header" id="headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
        Surgical
      </button>
    </h2>
  </div>

  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
    <div class="card accordion-body shadow-sm row">
      <div class="">
        <div class="row g-0">
          <div class="col">
            <div class="card-body">
              <h5 class="brand">Pathology Departments</h5>
              <p class="mb-5">Conducts a laboratory test for all the patients. The pathology department staff includes pathologists, laboratory technicians, clinical laboratory assistants, cytotechnologists, medical technologists, and laboratory managers. The pathology department is mainly responsible for collecting blood and fluid body samples of patients, performing diagnoses and generating reports.</p>
              <?php include 'components/department-cards.php'; ?>
            </div>
          </div>
        </div>
      </div> <!-- end of card container -->
    </div> <!-- end of accordion body container -->
  </div>

  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
    <div class="card accordion-body shadow-sm">
      <div class="">
        <div class="row g-0">
          <div class="col">
            <div class="card-body">
              <h5 class="brand">Nursing Department</h5>
              <p class="mb-5">Nursing Department's main goal is to provide regular and safe nursing care and education to its staff. Nurses perform initial assessments of the patients, educate them about their health, and provide surgical operations assistance. All nurses need to have a permit to work in hospital settings.</p>
              <?php include 'components/department-cards.php'; ?>
            </div>
          </div>
        </div>
      </div> <!-- end of card container -->
    </div>
  </div>
  <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
    <div class="card accordion-body shadow-sm">
      <div class="">
        <div class="row g-0">
          <div class="col">
            <div class="card-body">
              <h5 class="brand">Surgerical Department</h5>
              <p class="mb-5">Department of Surgery prides itself of fully trained and professional staff able to cater to the surgical needs of its clients across different sub-specializations, whether in-patient or out-patient, adult or pediatric age group.</p>
              <?php include 'components/department-cards.php'; ?>
            </div>
          </div>
        </div>
      </div> <!-- end of card container -->
    </div>
  </div>

</div> <!-- end of accordion flush -->