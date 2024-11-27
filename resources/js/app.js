import "./bootstrap";

import Alpine from "alpinejs";

import "tw-elements";

// Initialization for ES Users
import { Collapse, Dropdown, initTWE } from "tw-elements";

initTWE({ Collapse, Dropdown });

window.Alpine = Alpine;

Alpine.start();
