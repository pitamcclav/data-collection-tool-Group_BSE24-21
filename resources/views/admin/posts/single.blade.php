@extends('layouts.admin-layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __($post->id) }}
                        </h2>
                        <a href="{{route('admin.posts')}}" class="btn btn-secondary">Back</a>

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">

                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <h3>
                                        <center> Demographic Data</center>
                                    </h3>
                                </td>
                            </tr>

                            <tr>
                                <th>ID</th>
                                <td>{{ $post->id }}</td>
                            </tr>
                            <tr>
                                <th>Age Bracket</th>
                                <td>{{ $post->age_bracket }}</td>
                            </tr>
                            <tr>
                                <th>Emploment Status</th>
                                <td>{{ $post->employment_status }}</td>
                            </tr>
                            <tr>
                                <th>Education level</th>
                                <td>{{ $post->education_level }}</td>
                            </tr>


                            <!-------------Meals--------->

                            <tr>
                                <td colspan="2"><br>
                                    <center>
                                        <h3> Theme 2: Roles of Fathers and Mothers before the Covid-19 Lockdown</h3>
                                        <h4>Sub-Theme 2.1.1: Food</h4>
                                        <p>1. How often did your family miss
                                            breakfast, lunch or supper before the Covid-19 Lockdown?</p>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ $post->meals_before }}</td>
                            </tr>
                            <tr>
                                <td colspan="2"><br>
                                    <center>
                                        <p>2. How often did your family miss
                                            breakfast, lunch or supper during the Covid-19 Lockdown?</p>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ $post->meals_during }}</td>
                            </tr>

                            <!------------------------Shelter---------------------->

                            <tr>
                                <td colspan="2"><br>
                                    <center>
                                        <h3>2) Sub-Theme 2.1.3: Shelter</h3>
                                        <p>3. To what extent were you disturbed with issues concerning your shelter during the
                                            COVID 19 Lockdown? Considering that Not at all=1; only a little=2; somewhat=3; and A
                                            lot=4.</p>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ $post->shelterDisturbance }}</td>
                            </tr>

                            <!-------------------------couple conflicts----------->

                            <tr>
                                <td colspan="2"><br>
                                    <center>
                                        <h3>Theme 5: COUPLE CONFLICTS</h3>
                                        <h4>Sub-theme 5.2: Conflicts faced by parents due to social economic challenges as a
                                            result of COVID 19 Lockdown.</h4>
                                        <p>4. To what extent did you and your spouse experience the
                                        following types of conflicts due to the economic distress you experienced that was
                                        caused by the COVID 19 Lockdown? Fill in. <br> (1 - nonexistent, 2 - existent, 3 -
                                        moderately existent, 4 - highly existent, 5 - extremely existent)</p>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                            <tr>
                                <th>c) Disagreements</th>
                                <td>{{ $post->disagreements }}</td>
                            </tr>
                            <tr>
                                <th>c) Disrespect</th>
                                <td>{{ $post->disrespect }}</td>
                            </tr>
                            <tr>
                                <th>c) Fighting</th>
                                <td>{{ $post->fighting }}</td>
                            </tr>
                            <tr>
                                <th>d) Quarrels</th>
                                <td>{{ $post->quarrels }}</td>
                            </tr>
                            <tr>
                                <th>e) Seperation</th>
                                <td>{{ $post->seperation }}</td>
                            </tr>

                            <tr>
                                <td colspan="2"><br>
                                    <center>

                                        <p>5. On a scale of 1-5, rate the degree of emotional
                                            distress that you experienced due to the economic challenges that befell your family
                                            due to COVID 19 Lockdown. <br> (1 - Very Low, 2 - Low, 3 - Medium, 4 - High, 5 -
                                            Very high)</p>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ $post->emotional_distress }}</td>
                            </tr>

                            <!----------------------------theme 8--------------->

                            <tr>
                                <td colspan="2"><br>
                                    <center>
                                        <h3> Theme 8: Child externalizing behaviours exhibited by children as a result of harsh
                                    parenting roles during the COVID 19 lockdown</h3>
                                        <h4>Sub-theme: 7.2 Out-Comes of These Behaviours</h4>
                                        <p>6. Rate the extent to which the change in parenting roles during the COVID 19
                                            Lockdown affected children in the affected families in Mukono district; considering
                                            that; Mild=1; Moderate=2; and Severe=3</p>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ $post->outcomeBehaviours }}</td>
                            </tr>



                        </tbody>


                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

