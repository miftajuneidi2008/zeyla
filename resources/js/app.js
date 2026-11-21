import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

import { initNavbar } from "./sections/navbar";
import { initHero } from "./sections/hero";
import { initServices } from "./sections/services";
import { initProcess } from "./sections/process";
import { initWhyUs } from "./sections/why-us";
import { initFlash } from "./sections/flash";

gsap.registerPlugin(ScrollTrigger);

initNavbar();
initHero();
initServices();
initProcess();
initWhyUs();
initFlash();
