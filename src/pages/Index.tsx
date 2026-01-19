import { Link } from "react-router-dom";
import { Layout } from "@/components/layout/Layout";
import { ArticleCard } from "@/components/ArticleCard";
import { CategoryBadge } from "@/components/CategoryBadge";
import { NewsletterForm } from "@/components/NewsletterForm";
import { Button } from "@/components/ui/button";
import { 
  getRecentArticles, 
  getCurrentPrayer, 
  Category 
} from "@/data/mockData";
import { 
  FileText, 
  Star, 
  BookOpen, 
  Users, 
  ArrowRight, 
  Calendar,
  ChevronRight
} from "lucide-react";
import { useState } from "react";

const categories: { value: Category | 'all'; label: string }[] = [
  { value: 'all', label: 'Tous' },
  { value: 'sabeel', label: 'Documents Sabeel' },
  { value: 'kairos', label: 'Kairos' },
  { value: 'publications', label: 'Publications' },
  { value: 'videos', label: 'Vidéos' },
];

const collections = [
  {
    title: "Documents Sabeel Jérusalem",
    description: "Traductions françaises des publications de Sabeel, centre œcuménique de théologie de la libération en Palestine.",
    icon: FileText,
    href: "/documents-sabeel",
    color: "bg-sabeel/10 text-sabeel",
  },
  {
    title: "Documents Kairos",
    description: "Le document Kairos Palestine et les réponses œcuméniques du monde entier.",
    icon: Star,
    href: "/kairos",
    color: "bg-kairos/10 text-kairos",
  },
  {
    title: "Nos publications",
    description: "Livres traduits, actes de colloques, brochures et études produites par notre association.",
    icon: BookOpen,
    href: "/publications",
    color: "bg-publications/10 text-publications",
  },
  {
    title: "Nos partenaires",
    description: "Le réseau d'organisations et d'Églises engagées pour la paix et la justice en Palestine.",
    icon: Users,
    href: "/partenaires",
    color: "bg-primary/10 text-primary",
  },
];

const Index = () => {
  const [selectedCategory, setSelectedCategory] = useState<Category | 'all'>('all');
  const recentArticles = getRecentArticles(6);
  const currentPrayer = getCurrentPrayer();

  const filteredArticles = selectedCategory === 'all' 
    ? recentArticles 
    : recentArticles.filter(a => a.category === selectedCategory);

  const formattedPrayerDate = new Date(currentPrayer.date).toLocaleDateString('fr-FR', {
    day: 'numeric',
    month: 'long',
    year: 'numeric',
  });

  return (
    <Layout>
      {/* Hero Section */}
      <section className="relative bg-gradient-to-br from-primary/5 via-background to-accent/10 overflow-hidden">
        <div className="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiM0NDgwNDQiIGZpbGwtb3BhY2l0eT0iMC4wMyI+PGNpcmNsZSBjeD0iMzAiIGN5PSIzMCIgcj0iMiIvPjwvZz48L2c+PC9zdmc+')] opacity-50" />
        
        <div className="container mx-auto px-4 py-16 lg:py-24 relative">
          <div className="max-w-3xl mx-auto text-center">
            <h1 className="text-4xl md:text-5xl lg:text-6xl font-bold text-foreground mb-6 animate-fade-in">
              Amis de Sabeel France
            </h1>
            <p className="text-xl md:text-2xl text-muted-foreground mb-8">
              Solidarité avec le peuple palestinien
              <br className="hidden sm:block" />
              <span className="text-primary font-medium">Traduction et diffusion des documents de Sabeel Jérusalem</span>
            </p>
            <div className="flex flex-col sm:flex-row gap-4 justify-center">
              <Button size="lg" asChild>
                <Link to="/documents-sabeel">
                  Découvrir nos documents
                  <ArrowRight className="ml-2 h-5 w-5" />
                </Link>
              </Button>
              <Button size="lg" variant="outline" asChild>
                <Link to="/qui-sommes-nous">
                  Qui sommes-nous ?
                </Link>
              </Button>
            </div>
          </div>
        </div>
      </section>

      {/* Vague de prière de la semaine */}
      <section className="py-12 lg:py-16">
        <div className="container mx-auto px-4">
          <div className="max-w-4xl mx-auto">
            <div className="relative bg-card rounded-2xl border-2 border-prieres/30 overflow-hidden shadow-lg">
              <div className="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-prieres via-accent to-prieres" />
              <div className="p-6 lg:p-8">
                <div className="flex items-start justify-between gap-4 mb-4">
                  <div>
                    <CategoryBadge category="prieres" className="mb-2" />
                    <h2 className="text-2xl lg:text-3xl font-bold text-foreground">
                      Vague de prière de la semaine
                    </h2>
                  </div>
                  <div className="flex items-center gap-2 text-sm text-muted-foreground bg-secondary/50 px-3 py-1.5 rounded-full">
                    <Calendar className="h-4 w-4" />
                    {formattedPrayerDate}
                  </div>
                </div>
                <h3 className="text-lg font-semibold text-primary mb-3">
                  {currentPrayer.title}
                </h3>
                <p className="text-muted-foreground mb-6 line-clamp-3">
                  {currentPrayer.excerpt}
                </p>
                <Button asChild>
                  <Link to={`/vagues-de-prieres/${currentPrayer.id}`}>
                    Lire la prière complète
                    <ChevronRight className="ml-1 h-4 w-4" />
                  </Link>
                </Button>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Actualités récentes */}
      <section className="py-12 lg:py-16 bg-secondary/30">
        <div className="container mx-auto px-4">
          <div className="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-4 mb-8">
            <div>
              <h2 className="text-3xl font-bold text-foreground mb-2">
                Actualités récentes
              </h2>
              <p className="text-muted-foreground">
                Nos dernières publications et documents traduits
              </p>
            </div>
            
            {/* Category filters */}
            <div className="flex flex-wrap gap-2">
              {categories.map((cat) => (
                <button
                  key={cat.value}
                  onClick={() => setSelectedCategory(cat.value)}
                  className={`px-4 py-2 text-sm font-medium rounded-full transition-colors ${
                    selectedCategory === cat.value
                      ? 'bg-primary text-primary-foreground'
                      : 'bg-card text-muted-foreground hover:bg-secondary hover:text-foreground border border-border'
                  }`}
                >
                  {cat.label}
                </button>
              ))}
            </div>
          </div>

          {/* Articles grid */}
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {filteredArticles.length > 0 ? (
              filteredArticles.map((article) => (
                <ArticleCard key={article.id} article={article} />
              ))
            ) : (
              <div className="col-span-full text-center py-12">
                <p className="text-muted-foreground">
                  Aucun article dans cette catégorie pour le moment.
                </p>
              </div>
            )}
          </div>

          <div className="text-center mt-8">
            <Button variant="outline" size="lg" asChild>
              <Link to="/documents-sabeel">
                Voir tous les documents
                <ArrowRight className="ml-2 h-4 w-4" />
              </Link>
            </Button>
          </div>
        </div>
      </section>

      {/* Nos collections */}
      <section className="py-12 lg:py-16">
        <div className="container mx-auto px-4">
          <div className="text-center mb-10">
            <h2 className="text-3xl font-bold text-foreground mb-2">
              Nos collections
            </h2>
            <p className="text-muted-foreground max-w-2xl mx-auto">
              Explorez nos différentes ressources documentaires sur la Palestine et la théologie de la libération
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto">
            {collections.map((collection) => (
              <Link
                key={collection.title}
                to={collection.href}
                className="group flex gap-5 p-6 bg-card rounded-xl border border-border hover:border-primary/30 hover:shadow-lg transition-all duration-300"
              >
                <div className={`flex-shrink-0 p-4 rounded-xl ${collection.color}`}>
                  <collection.icon className="h-8 w-8" />
                </div>
                <div className="flex-1">
                  <h3 className="font-semibold text-lg mb-2 group-hover:text-primary transition-colors">
                    {collection.title}
                  </h3>
                  <p className="text-sm text-muted-foreground">
                    {collection.description}
                  </p>
                </div>
                <ChevronRight className="h-5 w-5 text-muted-foreground group-hover:text-primary transition-colors self-center" />
              </Link>
            ))}
          </div>
        </div>
      </section>

      {/* Newsletter */}
      <section className="py-12 lg:py-16 bg-primary/5">
        <div className="container mx-auto px-4">
          <div className="max-w-2xl mx-auto text-center">
            <h2 className="text-3xl font-bold text-foreground mb-3">
              Restez informé·e de nos publications
            </h2>
            <p className="text-muted-foreground mb-8">
              Recevez automatiquement nos nouveaux articles et la vague de prière hebdomadaire directement dans votre boîte mail.
            </p>
            <div className="max-w-md mx-auto">
              <NewsletterForm />
            </div>
          </div>
        </div>
      </section>
    </Layout>
  );
};

export default Index;
