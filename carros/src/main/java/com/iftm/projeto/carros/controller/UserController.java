package com.iftm.projeto.carros.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PostMapping;

import com.iftm.projeto.carros.model.User;
import com.iftm.projeto.carros.service.IUserService;

@Controller
public class UserController {

    @Autowired
    private IUserService userService;

    // Go to Registration Page
    @GetMapping("/register")
    public String register() {
        return "user/registerUser";
    }

    // Read Form data to save into DB
    @PostMapping("/saveUser")
    public String saveUser(
            @ModelAttribute User user,
            Model model) {
        Integer id = userService.saveUser(user);
        String message = "User '" + id + "' saved successfully !";
        model.addAttribute("msg", message);
        return "user/registerUser";
    }

    @GetMapping("/accessDenied")
	public String getAccessDeniedPage() {
		return "user/accessDeniedPage";
	}
}