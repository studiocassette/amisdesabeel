import { Layout } from "@/components/layout/Layout";
import { Heart, Users, BookOpen, Globe, MessageCircle } from "lucide-react";

const missions = [
  {
    icon: Heart,
    title: "Solidarité avec les Églises",
    description: "Développer des liens de solidarité avec les Églises présentes en Palestine–Israël et relayer leur témoignage."
  },
  {
    icon: BookOpen,
    title: "Diffusion et traduction",
    description: "Diffuser et faire connaître la réflexion et le témoignage des chrétiens palestiniens, notamment via la traduction de la Vague de prière hebdomadaire et de la revue Cornerstone."
  },
  {
    icon: Users,
    title: "Sensibilisation",
    description: "Sensibiliser les chrétiens et responsables d'Églises en France aux enjeux du conflit israélo-palestinien, et diffuser des informations du terrain via Sabeel."
  },
  {
    icon: Globe,
    title: "Soutien concret",
    description: "Soutenir concrètement le Centre Sabeel et des projets des Églises palestiniennes, favoriser des liens personnels par des visites, témoignages et accueils."
  },
  {
    icon: MessageCircle,
    title: "Dialogue interreligieux",
    description: "Favoriser le dialogue interreligieux avec musulmans et juifs autour des questions de justice et de paix."
  }
];

const QuiSommesNous = () => {
  return (
    <Layout>
      {/* Hero Section */}
      <section className="bg-gradient-to-b from-primary/10 to-background py-16 md:py-24">
        <div className="container mx-auto px-4">
          <div className="max-w-4xl mx-auto text-center">
            <h1 className="text-4xl md:text-5xl font-bold text-foreground mb-6">
              Qui sommes-nous ?
            </h1>
            <p className="text-xl text-muted-foreground leading-relaxed">
              <strong className="text-foreground">Amis de Sabeel – France (ADSF)</strong> est un réseau de soutien 
              au Centre œcuménique Sabeel, présent à Jérusalem et Nazareth.
            </p>
          </div>
        </div>
      </section>

      {/* About Sabeel Section */}
      <section className="py-16 bg-background">
        <div className="container mx-auto px-4">
          <div className="max-w-4xl mx-auto">
            <div className="bg-card rounded-2xl p-8 md:p-12 shadow-sm border">
              <h2 className="text-2xl md:text-3xl font-bold text-foreground mb-6">
                Le Centre Sabeel
              </h2>
              <div className="prose prose-lg max-w-none text-muted-foreground">
                <p className="mb-4">
                  <strong className="text-foreground">Sabeel</strong> (« le chemin » ou « la source » en arabe) 
                  est un centre œcuménique de théologie de la libération palestinienne, fondé à Jérusalem. 
                  Il offre un espace de réflexion théologique contextuelle pour les chrétiens palestiniens 
                  vivant sous occupation.
                </p>
                <p>
                  À travers ses programmes, Sabeel encourage une lecture des Écritures ancrée dans 
                  la justice et la non-violence, tout en témoignant de la réalité quotidienne 
                  des communautés chrétiennes de Terre Sainte.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Missions Section */}
      <section className="py-16 bg-muted/30">
        <div className="container mx-auto px-4">
          <div className="max-w-6xl mx-auto">
            <h2 className="text-2xl md:text-3xl font-bold text-foreground mb-12 text-center">
              Nos missions
            </h2>
            <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
              {missions.map((mission, index) => (
                <div 
                  key={index}
                  className="bg-card rounded-xl p-6 shadow-sm border hover:shadow-md transition-shadow"
                >
                  <div className="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-4">
                    <mission.icon className="w-6 h-6 text-primary" />
                  </div>
                  <h3 className="text-lg font-semibold text-foreground mb-3">
                    {mission.title}
                  </h3>
                  <p className="text-muted-foreground leading-relaxed">
                    {mission.description}
                  </p>
                </div>
              ))}
            </div>
          </div>
        </div>
      </section>

      {/* Approach Section */}
      <section className="py-16 bg-background">
        <div className="container mx-auto px-4">
          <div className="max-w-4xl mx-auto">
            <h2 className="text-2xl md:text-3xl font-bold text-foreground mb-8 text-center">
              Notre approche
            </h2>
            <div className="bg-primary/5 rounded-2xl p-8 md:p-12 border border-primary/20">
              <p className="text-lg text-muted-foreground leading-relaxed mb-6">
                Face à certaines lectures « prédéterminées » des Écritures, notamment celles 
                promues par le sionisme chrétien, nous proposons une réflexion théologique 
                alternative, enracinée dans les valeurs de justice, de paix et de réconciliation.
              </p>
              <p className="text-lg text-muted-foreground leading-relaxed">
                Nous croyons que la voix des chrétiens palestiniens mérite d'être entendue 
                et que leur témoignage contribue à une compréhension plus juste et équilibrée 
                de la situation en Terre Sainte.
              </p>
            </div>
          </div>
        </div>
      </section>

      {/* CTA Section */}
      <section className="py-16 bg-primary text-primary-foreground">
        <div className="container mx-auto px-4 text-center">
          <h2 className="text-2xl md:text-3xl font-bold mb-4">
            Rejoignez notre réseau
          </h2>
          <p className="text-lg opacity-90 mb-8 max-w-2xl mx-auto">
            Ensemble, soutenons les chrétiens de Palestine et œuvrons pour la justice et la paix.
          </p>
          <div className="flex flex-col sm:flex-row gap-4 justify-center">
            <a 
              href="/contact" 
              className="inline-flex items-center justify-center px-6 py-3 bg-background text-foreground rounded-lg font-medium hover:bg-background/90 transition-colors"
            >
              Nous contacter
            </a>
            <a 
              href="/vagues-de-prieres" 
              className="inline-flex items-center justify-center px-6 py-3 border-2 border-primary-foreground rounded-lg font-medium hover:bg-primary-foreground/10 transition-colors"
            >
              Découvrir les Vagues de prière
            </a>
          </div>
        </div>
      </section>
    </Layout>
  );
};

export default QuiSommesNous;
