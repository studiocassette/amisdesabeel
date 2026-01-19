import { Link } from "react-router-dom";
import { Logo } from "@/components/Logo";
import { Facebook, Twitter, Youtube, Mail } from "lucide-react";

const footerLinks = {
  navigation: [
    { name: "Accueil", href: "/" },
    { name: "Documents Sabeel", href: "/documents-sabeel" },
    { name: "Kairos", href: "/kairos" },
    { name: "Publications", href: "/publications" },
    { name: "Vagues de prières", href: "/vagues-de-prieres" },
    { name: "Partenaires", href: "/partenaires" },
  ],
  about: [
    { name: "Qui sommes-nous", href: "/qui-sommes-nous" },
    { name: "Notre mission", href: "/qui-sommes-nous#mission" },
    { name: "Sabeel Jérusalem", href: "https://sabeel.org", external: true },
  ],
  legal: [
    { name: "Mentions légales", href: "/mentions-legales" },
    { name: "Politique de confidentialité", href: "/confidentialite" },
  ],
};

const socialLinks = [
  { name: "Facebook", icon: Facebook, href: "https://facebook.com" },
  { name: "Twitter", icon: Twitter, href: "https://twitter.com" },
  { name: "YouTube", icon: Youtube, href: "https://youtube.com" },
  { name: "Email", icon: Mail, href: "mailto:contact@amisdesabeel.fr" },
];

export const Footer = () => {
  return (
    <footer className="bg-secondary/50 border-t border-border">
      <div className="container mx-auto px-4 py-12 lg:py-16">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
          {/* About */}
          <div className="lg:col-span-1">
            <Logo size="md" className="mb-4" />
            <p className="text-sm text-muted-foreground mb-4">
              Amis de Sabeel – France (ADSF) est un réseau de soutien au Centre œcuménique Sabeel, 
              présent à Jérusalem et Nazareth.
            </p>
            <p className="text-sm text-muted-foreground">
              Développer des liens de solidarité avec les Églises de Palestine–Israël et relayer leur témoignage.
            </p>
          </div>

          {/* Navigation */}
          <div>
            <h3 className="font-semibold mb-4">Navigation</h3>
            <ul className="space-y-2">
              {footerLinks.navigation.map((link) => (
                <li key={link.name}>
                  <Link
                    to={link.href}
                    className="text-sm text-muted-foreground hover:text-primary transition-colors"
                  >
                    {link.name}
                  </Link>
                </li>
              ))}
            </ul>
          </div>

          {/* À propos */}
          <div>
            <h3 className="font-semibold mb-4">À propos</h3>
            <ul className="space-y-2">
              {footerLinks.about.map((link) => (
                <li key={link.name}>
                  {link.external ? (
                    <a
                      href={link.href}
                      target="_blank"
                      rel="noopener noreferrer"
                      className="text-sm text-muted-foreground hover:text-primary transition-colors"
                    >
                      {link.name}
                    </a>
                  ) : (
                    <Link
                      to={link.href}
                      className="text-sm text-muted-foreground hover:text-primary transition-colors"
                    >
                      {link.name}
                    </Link>
                  )}
                </li>
              ))}
            </ul>
          </div>

          {/* Contact & Social */}
          <div>
            <h3 className="font-semibold mb-4">Nous contacter</h3>
            <address className="not-italic text-sm text-muted-foreground mb-4">
              <p>contact@amisdesabeel.fr</p>
              <p className="mt-1">France</p>
            </address>
            
            <h3 className="font-semibold mb-3">Suivez-nous</h3>
            <div className="flex gap-3">
              {socialLinks.map((social) => (
                <a
                  key={social.name}
                  href={social.href}
                  target="_blank"
                  rel="noopener noreferrer"
                  className="p-2 rounded-lg bg-background hover:bg-primary hover:text-primary-foreground transition-colors"
                  aria-label={social.name}
                >
                  <social.icon className="h-5 w-5" />
                </a>
              ))}
            </div>
          </div>
        </div>

        {/* Bottom */}
        <div className="mt-12 pt-8 border-t border-border">
          <div className="flex flex-col md:flex-row justify-between items-center gap-4">
            <p className="text-sm text-muted-foreground">
              © {new Date().getFullYear()} Amis de Sabeel France. Tous droits réservés.
            </p>
            <div className="flex gap-4">
              {footerLinks.legal.map((link) => (
                <Link
                  key={link.name}
                  to={link.href}
                  className="text-sm text-muted-foreground hover:text-primary transition-colors"
                >
                  {link.name}
                </Link>
              ))}
            </div>
          </div>
        </div>
      </div>
    </footer>
  );
};
