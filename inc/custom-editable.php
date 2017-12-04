<?php

// phone numbers
  function para_numbers_edit($wp_customize) {
    $wp_customize->add_section('para_numbers_section', array(
      'title' => 'Номера телефонов',
    ));

    // phone number 1
    $wp_customize->add_setting('para_numbers_one', array(
      'default' => '+7 495 960-24-27'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'para_numbers1_control', array(
      'label'=> 'Номера телефона 1 ',
      'section' => 'para_numbers_section',
      'settings' => 'para_numbers_one'
    )));

    // phone number 2
    $wp_customize->add_setting('para_numbers_two', array(
      'default' => '+7 495 960-24-66'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'para_numbers2_control', array(
      'label'=> 'Номера телефона 2',
      'section' => 'para_numbers_section',
      'settings' => 'para_numbers_two'
    )));

    // phone number 3
    $wp_customize->add_setting('para_numbers_three', array(
      'default' => '+7 903 722-51-06'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'para_numbers3_control', array(
      'label'=> 'Номера телефона 2',
      'section' => 'para_numbers_section',
      'settings' => 'para_numbers_three'
    )));
  }

  add_action('customize_register', 'para_numbers_edit');
  

// social media links
function para_social_links($wp_customize) {
  $wp_customize->add_section('para_social_links', array(
    'title' => 'Social Media',
  ));

  // Facebook
  $wp_customize->add_setting('para_social_facebook', array(
    'default' => 'http://facebook.com/'
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'para_facebook_control', array(
    'label'=> 'Facebook',
    'section' => 'para_social_links',
    'settings' => 'para_social_facebook'
  )));

  // Vkontakte
  $wp_customize->add_setting('para_social_vkontakte', array(
    'default' => 'http://vk.com/'
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'para_vkontakte_control', array(
    'label'=> 'VK',
    'section' => 'para_social_links',
    'settings' => 'para_social_vkontakte'
  )));
  

  // Intstagram
  $wp_customize->add_setting('para_social_instagram', array(
    'default' => 'http://instagram.com/'
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'para_instagram_control', array(
    'label'=> 'Instagram',
    'section' => 'para_social_links',
    'settings' => 'para_social_instagram'
  )));

  // email
  $wp_customize->add_setting('para_social_email', array(
    'default' => 'info@parasoil.ru'
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'para_email_control', array(
    'label'=> 'Email',
    'section' => 'para_social_links',
    'settings' => 'para_social_email'
  )));

}

add_action('customize_register', 'para_social_links');

// About us fields 
function para_home_about($wp_customize) {
  $wp_customize->add_section('para_home_about_section', array(
    'title' => 'О нас (на главной)',
  ));

  // about tile
  $wp_customize->add_setting('para_home_about_title', array(
    'default' => 'Любите путешествовать и при этом не тратить лишние деньги?'
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'para_home_about_title_control', array(
    'label'=> 'заголовок',
    'section' => 'para_home_about_section',
    'settings' => 'para_home_about_title'
  )));

  // paragraphe
  $wp_customize->add_setting('para_home_about_paragraph', array(
    'default' => 'Значит, вы правильно сделали, что заглянули к нам'
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'para_home_about_paragraph_control', array(
    'label'    => 'Текст',
    'section'  => 'para_home_about_section',
    'settings' => 'para_home_about_paragraph',
    'type'     => 'textarea'
  )));

  // Link
  $wp_customize->add_setting('para_home_about_link');

  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'para_home_about_link_control', array(
    'label'    => 'Ссылка',
    'section'  => 'para_home_about_section',
    'settings' => 'para_home_about_link',
    'type'     => 'dropdown-pages'
  )));

}

add_action('customize_register', 'para_home_about');
?>
