@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ $flag === 'new'?'Data Form':'Modify Data' }}
                    </h2>
                    <a href="{{ route('posts') }}" class="btn btn-secondary btn-md">Posts</a>
                    {{-- <a href="{{route('new_post') }}" class="btn
                    btn-outline-primary">New Post</a> --}}

                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <ul class="text-red-500">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <details>
                            <summary>
                                Interview Guide
                            </summary>
                            <p>This Study is intended to explore the changing notions of motherhood and fatherhood
                                amidst COVID 19 family-based challenges in Mukono District and therefore seeks for your
                                cooperation and participation by giving your views in this interview.
                                All your responses given during this interview session are intended to contribute
                                towards this study and shall be kept confidential. <br>
                                Thank you for your participation.
                            </p>
                        </details>
                        <br>

                        <!---bio data------------------------->
                        <fieldset>

                            <h2>Theme 1: Demographic Data</h2>

                            <h3>i) Age Bracket</h3>
                            <input class="form-check-input" type="radio" name="age_bracket" value="18-24 "
                                {{ old('age_bracket') === '18-24' ? 'checked' : '' }}>
                            18-24<br>
                            <input class="form-check-input" type="radio" name="age_bracket" value="25-35 "
                                {{ old('age_bracket') === '25-35' ? 'checked' : '' }}>
                            25-35<br>
                            <input class="form-check-input" type="radio" name="age_bracket" value="36-45 "
                                {{ old('age_bracket') === '36-45' ? 'checked' : '' }}>
                            36-45<br>
                            <input class="form-check-input" type="radio" name="age_bracket" value="46-55 "
                                {{ old('age_bracket') === '46-55' ? 'checked' : '' }}>
                            46-55<br>
                            <input class="form-check-input" type="radio" name="age_bracket" value="56-65 "
                                {{ old('age_bracket') === '56-65' ? 'checked' : '' }}>
                            56-65<br>
                            <input class="form-check-input" type="radio" name="age_bracket" value="66 years & beyond"
                                {{ old('age_bracket') === '66 years & beyond' ? 'checked' : '' }}>
                            66 years & beyond<br>

                            <br>
                            <h3>ii) Education Level</h3>
                            <input class="form-check-input" type="radio" name="education_level" value="None"
                                {{ old('education_level') === 'None' ? 'checked' : '' }}>
                            None<br>
                            <input class="form-check-input" type="radio" name="education_level" value="Primary"
                                {{ old('education_level') === 'Primary' ? 'checked' : '' }}>
                            Primary<br>
                            <input class="form-check-input" type="radio" name="education_level" value="Lower Secondary"
                                {{ old('education_level') === 'Lower Secondary' ? 'checked' : '' }}>
                            Lower Secondary<br>
                            <input class="form-check-input" type="radio" name="education_level" value="Higher Secondary"
                                {{ old('education_level') === 'Higher Secondary' ? 'checked' : '' }}>
                            Higher Secondary<br>
                            <input class="form-check-input" type="radio" name="education_level" value="Tertiary"
                                {{ old('education_level') === 'Tertiary' ? 'checked' : '' }}>
                            Tertiary<br>
                            <br>
                            <h3>iii) Employment Status</h3>
                            <input class="form-check-input" type="radio" name="employment_status"
                                value="Formal Employment"
                                {{ old('employment_status') === 'Formal Employment' ? 'checked' : '' }}>
                            Formal Employment<br>
                            <input class="form-check-input" type="radio" name="employment_status"
                                value="Informal Employment"
                                {{ old('employment_status') === 'Informal Employment' ? 'checked' :  '' }}>
                            Informal Employment<br>
                            <input class="form-check-input" type="radio" name="employment_status" value="No Employment"
                                {{ old('employment_status') === 'No Employment' ? 'checked' :'' }}>
                            No Employment<br>

                        </fieldset>

                        <hr>
                        <!-------------changing roles of motherhood and fatherhood----------->
                        <fieldset>
                            <div class="form-group">
                                <h3>Theme 2: Roles of Fathers and Mothers before the Covid-19 Lockdown</h3>
                                <br>
                                <!-- Sub-Theme 2.1.1: Food -->
                                <h4>Sub-Theme 2.1.1: Food</h4>
                                <br>
                                <!-- 1. How often did your family miss breakfast, lunch or supper before the Covid-19 Lockdown? -->
                                <label for="miss_breakfast_lunch_supper_before">1. How often did your family miss
                                    breakfast, lunch or supper before the Covid-19 Lockdown?</label><br>
                                <input class="form-check-input" type="radio" name="meals_before" value="1"
                                    {{ old('meals_before')==='1'?'checked':'' }}>
                                <label for="miss_breakfast_lunch_supper_before_never">Never</label><br>
                                <input class="form-check-input" type="radio" name="meals_before" value="2"
                                    {{ old('meals_before')==='2'?'checked':'' }}>
                                <label for="miss_breakfast_lunch_supper_before_sometimes">Sometimes</label><br>
                                <input class="form-check-input" type="radio" name="meals_before" value="3"
                                    {{ old('meals_before')==='3'?'checked':'' }}>
                                <label for="miss_breakfast_lunch_supper_before_often">Often</label><br>
                                <input class="form-check-input" type="radio" name="meals_before" value="4"
                                    {{ old('meals_before')==='4'?'checked':'' }}>
                                <label for="miss_breakfast_lunch_supper_before_always">Always</label><br>
                                <br>
                                <!-- 2. How often did your family miss breakfast, lunch or supper during the Covid-19 Lockdown? -->
                                <label for="miss_breakfast_lunch_supper_during">2. How often did your family miss
                                    breakfast, lunch or supper during the Covid-19 Lockdown?</label><br>
                                <input class="form-check-input" type="radio" name="meals_during" value="1"
                                    {{ old('meals_during')==='1'?'checked':'' }}>
                                <label for="meals_before_never">Never</label><br>
                                <input class="form-check-input" type="radio" name="meals_during" value="2"
                                    {{ old('meals_during')==='2'?'checked':'' }}>
                                <label for="meals_before_sometimes">Sometimes</label><br>
                                <input class="form-check-input" type="radio" name="meals_during" value="3"
                                    {{ old('meals_during')==='3'?'checked':'' }}>
                                <label for="meals_before_often">Often</label><br>
                                <input class="form-check-input" type="radio" name="meals_during" value="4"
                                    {{ old('meals_during')==='4'?'checked':'' }}>
                                <label for="meals_before_always">Always</label><br>
                                <br>
                                <!-- Sub-Theme 2.1.3: Shelter -->
                                <h5>Sub-Theme 2.1.3: Shelter</h5>
                                <p>3. To what extent were you disturbed with issues concerning your shelter during the
                                    COVID 19 Lockdown? Considering that Not at all=1; only a little=2; somewhat=3; and A
                                    lot=4.</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="shelterDisturbance"
                                        value="1"
                                        {{ old('shelterDisturbance')==='1'?'checked':'' }}>
                                    <label class="form-check-label" for="shelterDisturbance1"> Not at all </label><br>
                                    <input class="form-check-input" type="radio" name="shelterDisturbance"
                                        value="2"
                                        {{ old('shelterDisturbance')==='2'?'checked':'' }}>
                                    <label class="form-check-label" for="shelterDisturbance2"> Only a little
                                    </label><br>
                                    <input class="form-check-input" type="radio" name="shelterDisturbance"
                                        value="3"
                                        {{ old('shelterDisturbance')==='3'?'checked':'' }}>
                                    <label class="form-check-label" for="shelterDisturbance3"> Somewhat </label><br>
                                    <input class="form-check-input" type="radio" name="shelterDisturbance" value="4"
                                        {{ old('shelterDisturbance')==='4'?'checked':'' }}>
                                    <label class="form-check-label" for="shelterDisturbance4"> A lot </label>
                                </div>
                            </div>
                        </fieldset>
                        <hr>

                        <fieldset>
                            <!-- Theme 5: COUPLE CONFLICTS -->
                            <div class="form-group">
                                <h4>Theme 5: COUPLE CONFLICTS</h4>
                                <br>

                                <!-- Sub-theme 5.2: Conflicts faced by parents due to social economic challenges as a result of COVID 19 Lockdown. -->
                                <h5>Sub-theme 5.2: Conflicts faced by parents due to social economic challenges as a
                                    result of COVID 19 Lockdown.</h5><br>

                                <label for="conflicts">4. To what extent did you and your spouse experience the
                                    following types of conflicts due to the economic distress you experienced that was
                                    caused by the COVID 19 Lockdown? Fill in. <br> (1 - nonexistent, 2 - existent, 3 -
                                    moderately existent, 4 - highly existent, 5 - extremely existent)</label><br>
                                <input type="number" id="disagreements" name="disagreements" class="my-2"
                                    value="{{ $flag==='new'? old('disagreements'):$post->disagreements }}">
                                <label for="disagreements">Disagreements </label><br>
                                <input type="number" id="disrespect" name="disrespect" class="my-2"
                                    value="{{ $flag==='new'? old('disrespect'):$post->disrespect }}">
                                <label for="disrespect">Disrespect </label><br>
                                <input type="number" id="fighting" name="fighting" class="my-2"
                                    value="{{ $flag==='new'? old('fighting'):$post->fighting }}">
                                <label for="fighting">Fighting </label><br>
                                <input type="number" id="quarrels" name="quarrels" class="my-2"
                                    value="{{ $flag==='new'? old('quarrels'):$post->quarrels }}">
                                <label for="quarrels">Quarrels </label><br>
                                <input type="number" id="separation" name="seperation" class="my-2"
                                    value="{{ $flag==='new'? old('seperation'):$post->seperation }}">
                                <label for="separation">Separation </label><br>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="emotional_distress">5. On a scale of 1-5, rate the degree of emotional
                                    distress that you experienced due to the economic challenges that befell your family
                                    due to COVID 19 Lockdown. <br> (1 - Very Low, 2 - Low, 3 - Medium, 4 - High, 5 -
                                    Very high)</label><br>
                                <input class="form-check-input" type="radio" name="emotional_distress" value="1"
                                    {{ old('emotional_distress')==='1'?'checked':'' }}>
                                <label for="very_low">Very Low </label><br>
                                <input class="form-check-input" type="radio" name="emotional_distress" value="2"
                                    {{ old('emotional_distress')==='2'?'checked':'' }}>
                                <label for="low">Low </label><br>
                                <input class="form-check-input" type="radio" name="emotional_distress" value="3"
                                    {{ old('emotional_distress')==='3'?'checked':'' }}>
                                <label for="medium">Medium </label><br>
                                <input class="form-check-input" type="radio" name="emotional_distress" value="4"
                                    {{ old('emotional_distress')==='4'?'checked':'' }}>
                                <label for="high">High </label><br>
                                <input class="form-check-input" type="radio" name="emotional_distress" value="5"
                                    {{ old('emotional_distress')==='5'?'checked':'' }}>
                                <label for="high">Very High </label><br>
                            </div>
                        </fieldset>
                        <hr>
                        <!---------------effects----------------------->

                        <fieldset>
                            <div class="form-group">
                                <h4>Theme 8: Child externalizing behaviours exhibited by children as a result of harsh
                                    parenting roles during the COVID 19 lockdown</h4><br>
                                <h5>Sub-theme: 7.2 Out-Comes of These Behaviours</h5>
                                <p>6. Rate the extent to which the change in parenting roles during the COVID 19
                                    Lockdown affected children in the affected families in Mukono district; considering
                                    that; Mild=1; Moderate=2; and Severe=3</p>

                                <input class="form-check-input" type="radio" name="outcomeBehaviours" value="1"
                                    required
                                    {{ old('outcomeBehaviours')==='1'?'checked':'' }}>
                                <label class="form-check-label" for="outcomeBehaviours1"> Mild </label><br>
                                <input class="form-check-input" type="radio" name="outcomeBehaviours" value="2"
                                    required
                                    {{ old('outcomeBehaviours')==='2'?'checked':'' }}>
                                <label class="form-check-label" for="outcomeBehaviours2"> Moderate </label><br>
                                <input class="form-check-input" type="radio" name="outcomeBehaviours" value="3"
                                    required
                                    {{ old('outcomeBehaviours')==='3'?'checked':'' }}>
                                <label class="form-check-label" for="outcomeBehaviours3">Severe</label>

                            </div>


                            <br>
                            <span>Thank you!</span>
                        </fieldset>
                        <hr>


                        <div class="mb-3 buttons">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-danger">Clear form</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
