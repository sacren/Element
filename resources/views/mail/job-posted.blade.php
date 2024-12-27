<h2>
    {{ $job->title }}
</h2>

<p>
    Congratulations, your job has been posted.
</p>

<p>
    <a href="{{ url('/jobs/' . $job->id) }}">View Job</a>
</p>
