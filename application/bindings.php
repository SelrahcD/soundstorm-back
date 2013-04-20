<?php

IoC::singleton('userRepository', function()
{
    return new UserRepository;
});