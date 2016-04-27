<ul class="question-list object-list row">


    <li id="q1" class="question-item col-sm-12 col-md-6">
        <div class="question-wrapper">
            <div class="question-content">
                <h4 class="question-title">Power</h4>
                <p>Does your device power up and function normally?</p>
            </div>

            <div class="question-response">
                <input type="radio" name="question_power" id="q1_y" value="1" required ng-model="q1" ng-change="nextQuestion('q2')"><label for="q1_y" class="yay">Yes</label>
                <input type="radio" name="question_power" id="q1_n" value="0" required ng-model="q1" ng-change="nextQuestion('q2')"><label for="q1_n" class="nay">No</label>
            </div>
        </div>
    </li>


    <li id="q2" class="question-item col-sm-12 col-md-6">
        <div class="question-wrapper">
            <div class="question-content">
                <h4 class="question-title">Enclosure</h4>
                <p>Is the enclosure in good condition? (Normal wear and tear is okay)</p>
            </div>

            <div class="question-response">
                <input type="radio" name="question_enclosure" id="q2_y" value="1" required ng-model="q2" ng-change="nextQuestion('q3')"><label for="q2_y" class="yay">Yes</label>
                <input type="radio" name="question_enclosure" id="q2_n" value="0" required ng-model="q2" ng-change="nextQuestion('q3')"><label for="q2_n" class="nay">No</label>
            </div>
        </div>
    </li>


    <li id="q3" class="question-item col-sm-12 col-md-6">
        <div class="question-wrapper">
            <div class="question-content">
                <h4 class="question-title">Free from Liquid Damage</h4>
                <p>Is the device free from obvious signs of liquid contact?</p>
            </div>

            <div class="question-response">
                <input type="radio" name="question_liquid" id="q3_y" value="1" required ng-model="q3" ng-change="nextQuestion('q4')"><label for="q3_y" class="yay">Yes</label>
                <input type="radio" name="question_liquid" id="q3_n" value="0" required ng-model="q3" ng-change="nextQuestion('q4')"><label for="q3_n" class="nay">No</label>
            </div>
        </div>
    </li>


    <li id="q4" class="question-item col-sm-12 col-md-6">
        <div class="question-wrapper">
            <div class="question-content">
                <h4 class="question-title">Display</h4>
                <p>Is the display in good condition? (Normal wear and tear is okay)</p>
            </div>

            <div class="question-response">
                <input type="radio" name="question_display" id="q4_y" value="1" required ng-model="q4" ng-change="nextQuestion('q5')"><label for="q4_y" class="yay">Yes</label>
                <input type="radio" name="question_display" id="q4_n" value="0" required ng-model="q4" ng-change="nextQuestion('q5')"><label for="q4_n" class="nay">No</label>
            </div>
        </div>
    </li>


    <li id="q5" class="question-item col-sm-12 col-md-6">
        <div class="question-wrapper">
            <div class="question-content">
                <h4 class="question-title">Buttons</h4>
                <p>Are the buttons in good working condition?</p>
            </div>

            <div class="question-response">
                <input type="radio" name="question_buttons" id="q5_y" value="1" required ng-model="q5" ng-change="nextQuestion('q6')"><label for="q5_y" class="yay">Yes</label>
                <input type="radio" name="question_buttons" id="q5_n" value="0" required ng-model="q5" ng-change="nextQuestion('q6')"><label for="q5_n" class="nay">No</label>
            </6iv>
        </div>
    </li>


    <li id="q6" class="question-item col-sm-12 col-md-6">
        <div class="question-wrapper">
            <div class="question-content">
                <h4 class="question-title">Carrier Locked</h4>
                <p>Please select the appropriate carrier associated with your device.</p>
            </div>

            <div class="question-response">
                <select name="question_carrier" id="q6" class="form-control" required ng-model="carrier">
                    <option>Unlocked</option>
                    <option>Other</option>
                    <option>AT&T</option>
                    <option>Verizon</option>
                    <option>Sprint</option>
                    <option>T-Mobile</option>
                </select>
            </div>
        </div>

    </li>
</ul>