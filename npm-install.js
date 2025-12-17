// npm-install.js
import { execSync } from "child_process";
import { existsSync } from "fs";

if (existsSync("package.json")) {
	console.log("Installing drago-form...");
	execSync("npm install ./vendor/drago-ex/form", { stdio: "inherit" });
} else {
	console.log("No package.json, skipping npm install.");
}
