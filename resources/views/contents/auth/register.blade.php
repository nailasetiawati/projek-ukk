@extends('app.auth')

<div class="container">
    <form class="mt-5 ml-5 mr-5">
        <div class="form-group">
          <label for="exampleFormControlInput1">Username</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Password</label>
            <input type="password" class="form-control" id="exampleFormControlFile1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Confirm Password</label>
            <input type="password" class="form-control" id="exampleFormControlFile1">
        </div>
          <a href="/login"><div class="btn btn-primary">Submit</div></a>
          <a href="/login"><div class="btn btn-danger">Cancel</div></a>
      </form>
    </div>