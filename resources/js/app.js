import "./bootstrap";

import Alpine from "alpinejs";

import "tw-elements";

// Initialization for ES Users
import { Carousel, Collapse, Dropdown, initTWE } from "tw-elements";

initTWE({ Carousel, Collapse, Dropdown });

window.Alpine = Alpine;

Alpine.start();

console.log("TW Elements está cargado correctamente");
