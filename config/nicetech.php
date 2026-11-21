<?php

return [

    'name' => 'NICETECH',
    'email' => 'nicetech2027@gmail.com',
    'phones' => ['0911173788', '0923505175', '0920181846', '0916609427'],
    'address' => 'Kolfe Keranio, Addis Ababa, Ethiopia',

    'services' => [
        // Plan and build
        ['slug' => 'digital-consultancy', 'category' => 'Plan and build', 'name' => 'Digital Consultancy', 'summary' => 'Strategy and roadmaps for digital transformation.', 'description' => 'Strategy and roadmaps for organizational digital transformation.', 'outcome' => 'You leave with a clear, costed roadmap.', 'image' => 'digital-consultancy.svg'],
        ['slug' => 'website-development', 'category' => 'Plan and build', 'name' => 'Website Development', 'summary' => 'Professional, responsive organizational websites.', 'description' => 'Professional, responsive organizational websites.', 'outcome' => 'A fast site your team can update on its own.', 'image' => 'website-development.svg'],
        ['slug' => 'management-systems-erp', 'category' => 'Plan and build', 'name' => 'Management Systems & ERP', 'summary' => 'Management systems and full ERP modules.', 'description' => 'Comprehensive management systems and full organizational ERP modules.', 'outcome' => 'One system instead of scattered spreadsheets.', 'image' => 'management-systems-erp.svg'],

        // Automate and grow
        ['slug' => 'ai-workflow-automation', 'category' => 'Automate and grow', 'name' => 'AI Workflow Automation', 'summary' => 'Automate repetitive processes with AI and low-code tools.', 'description' => 'Automating repetitive processes with AI and low-code tools.', 'outcome' => 'Less manual work and fewer errors.', 'image' => 'ai-workflow-automation.svg'],
        ['slug' => 'personal-ai-assistants', 'category' => 'Automate and grow', 'name' => 'Personal AI Assistants', 'summary' => 'AI assistants that boost staff productivity.', 'description' => 'AI assistant setup to boost individual staff productivity.', 'outcome' => 'Staff spend time on decisions, not drafts.', 'image' => 'personal-ai-assistants.svg'],
        ['slug' => 'seo-services', 'category' => 'Automate and grow', 'name' => 'SEO Services', 'summary' => 'Search optimization for existing websites.', 'description' => 'Search optimization for existing organizational websites.', 'outcome' => 'The right people find you in search.', 'image' => 'seo-services.svg'],

        // Secure and scale
        ['slug' => 'it-solutions', 'category' => 'Secure and scale', 'name' => 'IT Solutions', 'summary' => 'End-to-end IT infrastructure and digital solutions.', 'description' => 'End-to-end IT infrastructure and digital solutions.', 'outcome' => 'Infrastructure that stays up and stays supported.', 'image' => 'it-solutions.svg'],
        ['slug' => 'cybersecurity-services', 'category' => 'Secure and scale', 'name' => 'Cybersecurity Services', 'summary' => 'Security assessments, frameworks, and incident response.', 'description' => 'Security assessments, frameworks, and incident response.', 'outcome' => 'You know your risks and how to respond.', 'image' => 'cybersecurity-services.svg'],
        ['slug' => 'smart-city-solutions', 'category' => 'Secure and scale', 'name' => 'Smart City Solutions', 'summary' => 'IoT-based urban monitoring and smart governance.', 'description' => 'IoT-based urban monitoring and smart governance platforms.', 'outcome' => 'Live data for better city decisions.', 'image' => 'smart-city-solutions.svg'],
    ],

    'steps' => [
        ['title' => 'Discover',      'description' => 'Stakeholder engagement and needs assessment.', 'icon' => 'search'],
        ['title' => 'Design',        'description' => 'Solution architecture and user experience design.', 'icon' => 'layout'],
        ['title' => 'Build',         'description' => 'Development and system integration.', 'icon' => 'code'],
        ['title' => 'Test & Deploy', 'description' => 'Quality assurance and rollout.', 'icon' => 'upload'],
        ['title' => 'Support',       'description' => 'Ongoing maintenance and support.', 'icon' => 'lifebuoy'],
    ],

    'reasons' => [
        ['title' => 'End-to-end delivery',         'description' => 'Strategy, build, and support in one place.', 'icon' => 'route'],
        ['title' => 'Government & NGO experience', 'description' => 'Proven delivery for the public and non-profit sector.', 'icon' => 'building'],
        ['title' => 'Built to last',               'description' => 'Secure, maintainable systems your team can own.', 'icon' => 'shield'],
        ['title' => 'Modern, secure technology',   'description' => 'Development practices built around security, scalability, and long-term maintainability.', 'icon' => 'chip'],
    ],
];
