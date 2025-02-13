import React from "react";
import ReactDOM from "react-dom/client";
import App from "./App";
import ThemeContextOverlay from "./components/overlay/ThemeContextOverlay";
import QueryContextOverlay from "./components/overlay/QueryContextOverlay";
import CreateShipmentWidget from "./components/widgets/CreateShipmentWidget";
import CreateShipmentLabelWidget from "./components/widgets/CreateShipmentLabelWidget";
import SelectPrintWidget from "./components/widgets/SelectPrintWidget";

const getELement = (element: HTMLElement | string) => {
  if (typeof element === "string") {
    return document.getElementById(element);
  } else if (element) return element;
  return null;
};

let styleUpdated = false;

const methods = {
  optionsPage: (element: string | HTMLElement) =>
    ReactDOM.createRoot(getELement(element)!).render(
      <React.StrictMode>
        <QueryContextOverlay>
          <ThemeContextOverlay>
            <App />
          </ThemeContextOverlay>
        </QueryContextOverlay>
      </React.StrictMode>
    ),
  newShipment: (element: string | HTMLElement, args: Record<string, any>) => {
    const root = ReactDOM.createRoot(getELement(element)!);
    root.render(
      <QueryContextOverlay>
        <ThemeContextOverlay>
          <CreateShipmentWidget shipment={args.shipment} onFinish={args.onFinish} onChange={args.onChange}/>
        </ThemeContextOverlay>
      </QueryContextOverlay>
    );

    return {
      unmount: () => root.unmount(),
    };
  },
  newLabel: (element: string | HTMLElement, args: Record<string, any>) => {
    const root = ReactDOM.createRoot(getELement(element)!);
    root.render(
        <QueryContextOverlay>
          <ThemeContextOverlay>
            <CreateShipmentLabelWidget hideOrderAnchor={args.hideOrderAnchor} shipments={[{ shipment: args.shipment, errors: {} }]} onFinish={args.onFinish} onRefresh={args.onRefresh} />
          </ThemeContextOverlay>
        </QueryContextOverlay>
    );

    return {
      unmount: () => root.unmount(),
    };
  },

  selectLabelPrint: (element: string|HTMLElement, args: Record<string, any>) => {
    const root = ReactDOM.createRoot(getELement(element)!)

    const render = (args: Record<string, any>) => {
      root.render(
          <QueryContextOverlay>
            <ThemeContextOverlay>
              <SelectPrintWidget onChange={args.onChange} optionals={args.optionals} value={args.value} onFinish={args.onFinish}/>
            </ThemeContextOverlay>
          </QueryContextOverlay>
      );
    }

    render(args);

    return {
      unmount: () => root.unmount(),
      render
    };
  },
  newLabels: (element: string | HTMLElement, args: Record<string, any>) => {
    const root = ReactDOM.createRoot(getELement(element)!);
    root.render(
      <QueryContextOverlay>
        <ThemeContextOverlay>
          <CreateShipmentLabelWidget shipments={args.shipments} onFinish={args.onFinish} onRefresh={args.onRefresh} />
        </ThemeContextOverlay>
      </QueryContextOverlay>
    );
    return {
      unmount: () => root.unmount(),
    };
  },
  wpUpdateStyle: () => {
    if (styleUpdated) return;

    const head = document.head;
    let link = document.createElement("link");
    link.setAttribute("rel", "preconnect");
    link.setAttribute("href", "https://fonts.googleapis.com");
    head.appendChild(link);
    link.setAttribute("rel", "preconnect");
    link.setAttribute("href", "https://fonts.gstatic.com");
    link.setAttribute("crossorigin", "crossorigin");
    head.appendChild(link);
    link.setAttribute(
      "href",
      "https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    );
    link.setAttribute("rel", "stylesheet");
    head.appendChild(link);

    link = Array.from(document.getElementsByTagName("link")).find(x =>
      x.getAttribute("href")?.includes("load-styles.php?")
    ) as HTMLLinkElement;
    if (link) {
      styleUpdated = true;
      fetch(link.getAttribute("href")!)
        .then(x => x.text())
        .then(stylesText => {
          const style = document.createElement("style");
          style.textContent = stylesText;
          link.parentElement?.insertBefore(style, link.nextSibling);
          link.parentElement?.removeChild(link);
          const sheet = style.sheet;
          if (sheet) {
            Array.from(sheet.cssRules).forEach(x => {
              if ("selectorText" in x && x.selectorText) {
                const oldText = x.selectorText as string;
                if (oldText.match(/svg|div|h[0-6]|input|button|(\.|^|\s)p(\.|$|\s)/)) {
                  if (oldText.includes(":") || oldText.includes("components-button")) return;
                  x.selectorText = oldText.split(",").map(x => `${x}:not(.wp-reset-div ${x})`);
                }
              }
              return x;
            });
          }
        });
    }
  },
};

type InputType = [
  string,
  string | HTMLElement,
  {
    args?: Record<string, any>;
    returnFunc?: (args: Record<string, any>) => void;
  }
];

(function () {
  // @ts-ignore
  const requiredCalls = window.PPLczPlugin || [];

  // @ts-ignore
  const externalMethods = Object.keys(window.PPLczPlugin).reduce((acc, methodName) => {
    if (methodName.match(/^pplcz/)) {
      // @ts-ignore
      acc[methodName] = window.PPLczPlugin[methodName];
    }
    return acc;
  }, {});

  const PPLczPlugin = {
    push: (input: InputType) => {
      const [method, elementId] = input;
      const args = input[2] || {};
      const returnFunc = input[2]?.returnFunc || ((args: Record<string, any>) => {});

      if (!(method in methods) && !(method in PPLczPlugin)) {
        throw new Error(`method ${method} not found`);
      }

      const element = getELement(elementId);
      if (!element) {
        throw new Error(`element ${element} not found`);
      }

      if (/^pplcz/.test(method)) {
        methods["wpUpdateStyle"]();
      }
      if (method in methods) {
        // @ts-ignore
        const retData = methods[method](element, args);
        returnFunc(retData);
      } else if (method in PPLczPlugin) {
        // @ts-ignore
        const retData = PPLczPlugin[method](element, args);
        returnFunc(retData);
      }
    },
    // @ts-ignore
    ...externalMethods,
  };

  // @ts-ignore
  window.PPLczPlugin = PPLczPlugin;

  if (requiredCalls && requiredCalls.length) {
    requiredCalls.forEach((x: InputType) => {
      try {
        PPLczPlugin.push(x);
      } catch (e) {
        console.error(e);
      }
    });
  }
})();

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
