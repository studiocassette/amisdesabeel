import { Link } from "react-router-dom";
import { cn } from "@/lib/utils";
import { CategoryBadge } from "./CategoryBadge";
import { Calendar } from "lucide-react";
import { Article } from "@/data/mockData";

interface ArticleCardProps {
  article: Article;
  variant?: 'default' | 'compact' | 'featured';
  className?: string;
}

export const ArticleCard = ({ article, variant = 'default', className }: ArticleCardProps) => {
  const formattedDate = new Date(article.date).toLocaleDateString('fr-FR', {
    day: 'numeric',
    month: 'long',
    year: 'numeric',
  });

  if (variant === 'compact') {
    return (
      <Link
        to={`/article/${article.id}`}
        className={cn(
          "group flex items-center gap-4 p-3 rounded-lg bg-card hover:bg-secondary/50 transition-colors border border-border/50",
          className
        )}
      >
        <div className="flex-1 min-w-0">
          <div className="flex items-center gap-2 mb-1">
            <CategoryBadge category={article.category} size="sm" />
            <span className="text-xs text-muted-foreground flex items-center gap-1">
              <Calendar className="h-3 w-3" />
              {formattedDate}
            </span>
          </div>
          <h3 className="font-medium text-sm group-hover:text-primary transition-colors line-clamp-1">
            {article.title}
          </h3>
        </div>
      </Link>
    );
  }

  if (variant === 'featured') {
    return (
      <Link
        to={`/article/${article.id}`}
        className={cn(
          "group relative overflow-hidden rounded-xl bg-card border border-border shadow-sm hover:shadow-lg transition-all duration-300",
          className
        )}
      >
        <div className="aspect-[16/9] bg-gradient-to-br from-primary/20 to-accent/30 relative overflow-hidden">
          <div className="absolute inset-0 bg-gradient-to-t from-card/90 to-transparent" />
          <div className="absolute bottom-4 left-4 right-4">
            <CategoryBadge category={article.category} className="mb-2" />
            <h3 className="font-semibold text-xl group-hover:text-primary transition-colors line-clamp-2">
              {article.title}
            </h3>
          </div>
        </div>
        <div className="p-4">
          <p className="text-muted-foreground text-sm line-clamp-2 mb-3">{article.excerpt}</p>
          <div className="flex items-center gap-2 text-xs text-muted-foreground">
            <Calendar className="h-3.5 w-3.5" />
            {formattedDate}
          </div>
        </div>
      </Link>
    );
  }

  // Default variant
  return (
    <Link
      to={`/article/${article.id}`}
      className={cn(
        "group flex flex-col rounded-xl bg-card border border-border overflow-hidden hover:shadow-md hover:-translate-y-1 transition-all duration-300",
        className
      )}
    >
      <div className="aspect-[16/10] bg-gradient-to-br from-primary/10 via-secondary/20 to-accent/20 relative">
        <div className="absolute top-3 left-3">
          <CategoryBadge category={article.category} size="sm" />
        </div>
      </div>
      <div className="p-4 flex-1 flex flex-col">
        <h3 className="font-semibold text-base group-hover:text-primary transition-colors line-clamp-2 mb-2">
          {article.title}
        </h3>
        <p className="text-muted-foreground text-sm line-clamp-2 mb-3 flex-1">
          {article.excerpt}
        </p>
        <div className="flex items-center gap-2 text-xs text-muted-foreground">
          <Calendar className="h-3.5 w-3.5" />
          {formattedDate}
        </div>
      </div>
    </Link>
  );
};
