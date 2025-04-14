package com.example.demo.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;
 
 import com.example.demo.model.Product;
 import com.example.demo.service.ProductService;
 
 @Controller
 public class ProductController {

    @Autowired
     private ProductService productService;
 
    @GetMapping("/product")
    public String index(Model model) {
        model.addAttribute("productsList", productService.getAllProducts());
        return "product/index";
    }
     
 }